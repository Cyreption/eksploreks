<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CalendarEvent::where('user_id', Auth::id())->get();
        return view('calendar.index', compact('events'));
    }

    /**
     * Show month view
     */
    public function month()
    {
        $events = CalendarEvent::where('user_id', Auth::id())->get();
        return view('calendar.month', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date_time' => 'required|date_format:Y-m-d H:i',
            'all_day' => 'boolean',
            'color' => 'required|string|in:Yellow,Red,Blue',
            'location' => 'nullable|string|max:255',
            'notification' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['all_day'] = $request->has('all_day') ? true : false;
        $validated['notification'] = $request->has('notification') ? true : false;

        CalendarEvent::create($validated);

        return redirect()->route('calendar.index')->with('success', 'Event berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendarEvent $calendarEvent)
    {
        return view('calendar.show', compact('calendarEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendarEvent $calendarEvent)
    {
        return view('calendar.edit', compact('calendarEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalendarEvent $calendarEvent)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date_time' => 'required|date_format:Y-m-d H:i',
            'all_day' => 'boolean',
            'color' => 'required|string|in:Yellow,Red,Blue',
            'location' => 'nullable|string|max:255',
            'notification' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['all_day'] = $request->has('all_day') ? true : false;
        $validated['notification'] = $request->has('notification') ? true : false;

        $calendarEvent->update($validated);

        return redirect()->route('calendar.show', $calendarEvent)->with('success', 'Event berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarEvent $calendarEvent)
    {
        $calendarEvent->delete();
        return redirect()->route('calendar.index')->with('success', 'Event berhasil dihapus');
    }
}
