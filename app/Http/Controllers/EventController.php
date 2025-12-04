<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a paginated list of events.
     * Supports searching by title and organizer via query string ?q=...
     */
    public function index(\Illuminate\Http\Request $request)
    {
        $q = trim($request->query('q', ''));

        $events = Event::query()
            ->when($q !== '', function ($query) use ($q) {
                $term = '%' . mb_strtolower($q, 'UTF-8') . '%';
                $query->where(function ($sub) use ($term) {
                    $sub->whereRaw('LOWER(title) LIKE ?', [$term])
                        ->orWhereRaw('LOWER(organizer) LIKE ?', [$term])
                        ->orWhereRaw('LOWER(description) LIKE ?', [$term]);
                });
            })
            ->orderBy('start_time', 'asc')
            ->paginate(12)
            ->appends(['q' => $q]);

        return view('events.index', compact('events', 'q'));
    }

    /**
     * Show the form to create a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     * - Validates input
     * - Handles optional image upload to public/uploads/events
     * - Combines date + time inputs into start_time / end_time (Carbon)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'organizer'         => 'nullable|string|max:255',
            'location'          => 'nullable|string|max:255',
            'registration_link' => 'nullable|url',
            'file_link'         => 'nullable|url',
            'start_date'        => 'nullable|date',
            'start_time'        => 'nullable',
            'end_date'          => 'nullable|date',
            'end_time'          => 'nullable',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // parse combined datetimes
        $start = $this->combineDateTime($request->input('start_date'), $request->input('start_time')); // Carbon|null
        $end   = $this->combineDateTime($request->input('end_date'), $request->input('end_time'));

        // if both provided, ensure end >= start
        if ($start && $end && $end->lt($start)) {
            return back()
                ->withInput()
                ->withErrors(['end_time' => 'End date/time must be the same or after start date/time.']);
        }

        // handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/events'), $filename);
            $data['image'] = 'uploads/events/' . $filename;
        }

        $data['start_time'] = $start;
        $data['end_time']   = $end;
        $data['user_id'] = Auth::id() ?? 1;

        $event = Event::create($data);

        return redirect()->route('events.show', $event)->with('success', 'Event created.');
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        return view('events.show.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     * - Validates input
     * - Handles optional image replacement (deletes old image file)
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'organizer'         => 'nullable|string|max:255',
            'location'          => 'nullable|string|max:255',
            'registration_link' => 'nullable|url',
            'file_link'         => 'nullable|url',
            'start_date'        => 'nullable|date',
            'start_time'        => 'nullable',
            'end_date'          => 'nullable|date',
            'end_time'          => 'nullable',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Replace image if uploaded
        if ($request->hasFile('image')) {
            // delete old image file if exists
            if (!empty($event->image) && File::exists(public_path($event->image))) {
                File::delete(public_path($event->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/events'), $filename);
            $data['image'] = 'uploads/events/' . $filename;
        }

        $data['start_time'] = $this->combineDateTime($request->input('start_date'), $request->input('start_time'));
        $data['end_time']   = $this->combineDateTime($request->input('end_date'), $request->input('end_time'));

        $event->update($data);

        return redirect()->route('events.show', $event)
                         ->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified event from storage.
     * Also deletes uploaded image file if present.
     */
    public function destroy(Event $event)
    {
        if (!empty($event->image) && File::exists(public_path($event->image))) {
            File::delete(public_path($event->image));
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }

    /**
     * Redirect to the event's registration link (external).
     * If invalid or missing, redirect back to event with error message.
     */
    public function downloadLink(Event $event)
    {
        $url = $event->registration_link ?? null;

        if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect()->away($url);
        }

        return redirect()->route('events.show', $event)
                         ->with('error', 'Registration link not available or invalid.');
    }

    /**
     * Redirect to the event's file link (external).
     * If invalid or missing, redirect back to event with error message.
     */
    public function downloadFile(Event $event)
    {
        $url = $event->file_link ?? null;

        if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect()->away($url);
        }

        return redirect()->route('events.show', $event)
                         ->with('error', 'File link not available or invalid.');
    }

    /**
     * Helper: combine separate date and time inputs into a Carbon datetime or null.
     * Accepts:
     *  - date: Y-m-d (string) and time: H:i (string)
     *  - if only date provided, returns date at midnight
     */
    protected function combineDateTime($date, $time)
    {
        if ($date && $time) {
            return Carbon::parse("{$date} {$time}");
        }
        if ($date) {
            return Carbon::parse($date);
        }
        if ($time) {
            // fallback: today + time
            return Carbon::parse(date('Y-m-d') . ' ' . $time);
        }
        return null;
    }
}