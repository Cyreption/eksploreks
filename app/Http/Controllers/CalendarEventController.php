<?php

// Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060)

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarEventController extends Controller
{
    /**
     * Display a listing of the calendar events.
     */
    public function listCalendarEvents()
    {
        $events = CalendarEvent::where('user_id', Auth::id())->get();
        return view('calendar.index', compact('events'));
    }

    /**
     * Show month view of calendar events
     */
    public function showMonthView()
    {
        $events = CalendarEvent::where('user_id', Auth::id())->get();
        return view('calendar.month', compact('events'));
    }

    /**
     * Show the form for creating a new calendar event.
     */
    public function createCalendarEvent()
    {
        return view('calendar.create');
    }

    /**
     * Store a newly created calendar event in storage.
     */
    public function storeCalendarEvent(Request $request)
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
     * Display the specified calendar event.
     */
    public function showCalendarEvent(CalendarEvent $calendarEvent)
    {
        return view('calendar.show', compact('calendarEvent'));
    }

    /**
     * Show the form for editing the specified calendar event.
     */
    public function editCalendarEvent(CalendarEvent $calendarEvent)
    {
        return view('calendar.edit', compact('calendarEvent'));
    }

    /**
     * Update the specified calendar event in storage.
     */
    public function updateCalendarEvent(Request $request, CalendarEvent $calendarEvent)
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
     * Remove the specified calendar event from storage.
     */
    public function deleteCalendarEvent(CalendarEvent $calendarEvent)
    {
        $calendarEvent->delete();
        return redirect()->route('calendar.index')->with('success', 'Event berhasil dihapus');
    }
}