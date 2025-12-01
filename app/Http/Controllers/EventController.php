<?php

// created by Hafizhan Yusra Sulistyo - 5026231060


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function create()
    {
        return view('events.create');
    }

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
    ]);

    // helper parse: accept combinations:
    $parseCombined = function ($date, $time) {
        if ($date && $time) {
            return Carbon::parse($date . ' ' . $time);
        }
        if ($date && !$time) {
            return Carbon::parse($date);
        }
        if (!$date && $time) {
            // fallback: try parse time only today
            return Carbon::parse(date('Y-m-d') . ' ' . $time);
        }
        return null;
    };

    // handle if user submitted datetime-local in start_time/end_time directly
    $submittedStart = $request->input('start_time');
    $submittedEnd   = $request->input('end_time');

    // detect if start_date present (we use date+time inputs)
    if ($request->filled('start_date') || $request->filled('start_time')) {
        $data['start_time'] = $parseCombined($request->input('start_date'), $request->input('start_time'));
    } else {
        // try parse generic datetime string (e.g. datetime-local or existing formats)
        $data['start_time'] = $submittedStart ? Carbon::parse(str_replace('T', ' ', $submittedStart)) : null;
    }

    if ($request->filled('end_date') || $request->filled('end_time')) {
        $data['end_time'] = $parseCombined($request->input('end_date'), $request->input('end_time'));
    } else {
        $data['end_time'] = $submittedEnd ? Carbon::parse(str_replace('T', ' ', $submittedEnd)) : null;
    }

    $data['user_id'] = Auth::id() ?? 1;

    $event = Event::create($data);

    return redirect()->route('events.show', $event)->with('success', 'Event berhasil dibuat.');
}

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show.show', compact('event'));
    }

        public function index(\Illuminate\Http\Request $request)
    {
        $q = $request->query('q');
        $events = \App\Models\Event::when($q, function ($query, $q) {
                    $query->where('title', 'like', "%{$q}%")
                          ->orWhere('description', 'like', "%{$q}%")
                          ->orWhere('organizer', 'like', "%{$q}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(12)
                ->appends(['q' => $q]);

        return view('events.index', compact('events', 'q'));
    }
        public function downloadLink(Event $event)
    {
        $url = $event->registration_link ?? $event->link ?? null;

        if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect()->away($url);
        }

        return redirect()->route('events.show', $event)
                         ->with('error', 'Registration link not available or invalid.');
    }

    public function downloadFile(Event $event)
    {
        $url = $event->file_link ?? null;

        if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect()->away($url);
        }

        return redirect()->route('events.show', $event)
                         ->with('error', 'File link not available or invalid.');
    }
}