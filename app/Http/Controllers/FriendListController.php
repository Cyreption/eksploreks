<?php

// Author: Nashita Aulia (5026231054)

namespace App\Http\Controllers;

use App\Models\FriendList;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendListController extends Controller
{
    /**
     * Display a listing of the resource (connect page with suggestions).
     */
    public function index()
    {
        $userId = session('user_id');
        
        // Get friend IDs in both directions (user_id = current user OR friend_id = current user)
        $friendIds = FriendList::where('user_id', $userId)
            ->orWhere('friend_id', $userId)
            ->pluck('friend_id')
            ->merge(FriendList::where('friend_id', $userId)
                ->orWhere('user_id', $userId)
                ->pluck('user_id'))
            ->unique()
            ->filter(fn($id) => $id != $userId)
            ->toArray();
        
        // Get pending request IDs (sent OR received by current user)
        $pendingRequestIds = FriendRequest::where(function($q) use ($userId) {
            $q->where('user_id', $userId)->orWhere('friend_id', $userId);
        })
        ->where('status', 'pending')
        ->pluck('user_id')
        ->merge(FriendRequest::where(function($q) use ($userId) {
            $q->where('user_id', $userId)->orWhere('friend_id', $userId);
        })
        ->where('status', 'pending')
        ->pluck('friend_id'))
        ->unique()
        ->filter(fn($id) => $id != $userId)
        ->toArray();
        
        // Get all users not in friend list and no pending request
        $suggestions = User::where('user_id', '!=', $userId)
            ->whereNotIn('user_id', $friendIds)
            ->whereNotIn('user_id', $pendingRequestIds)
            ->get();
        
        // Get friends in both directions
        $friends = FriendList::where('user_id', $userId)
            ->orWhere('friend_id', $userId)
            ->with(['friend', 'user'])
            ->get()
            ->map(function($friendList) use ($userId) {
                // Map to friend_data for consistent view usage
                if ($friendList->user_id == $userId) {
                    $friendList->friend_data = $friendList->friend;
                } else {
                    $friendList->friend_data = $friendList->user;
                }
                return $friendList;
            });
        
        return view('connect.connect', ['suggestions' => $suggestions, 'friends' => $friends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FriendList $friendList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FriendList $friendList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FriendList $friendList)
    {
        //
    }

    /**
     * Remove the specified resource from storage (unfriend).
     */
    public function destroy(FriendList $friendList)
    {
        $friendList->delete();
        return back()->with('success', 'Teman dihapus dari daftar');
    }
}
