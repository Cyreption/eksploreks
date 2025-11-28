<?php

// created by Hafizhan Yusra Sulistyo - 5026231060


namespace App\Http\Controllers;

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
            'start_time'        => 'nullable|date',
            'end_time'          => 'nullable|date|after_or_equal:start_time',
        ]);

        // isi user_id dari user yang login (fallback 1 untuk dev)
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