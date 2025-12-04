<?php

// Author: Nashita Aulia (5026231054)

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\FriendList;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource (incoming requests).
     */
    public function index()
    {
        $userId = session('user_id');
        $requests = FriendRequest::where('friend_id', $userId)
            ->where('status', 'pending')
            ->with('user')
            ->get();
        
        return view('connect.request', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage (send friend request).
     */
    public function store(Request $request)
    {
        $userId = session('user_id');
        $friendId = $request->input('friend_id');
        
        // Check if already friends
        $alreadyFriends = FriendList::where(function($query) use ($userId, $friendId) {
            $query->where('user_id', $userId)->where('friend_id', $friendId)
                  ->orWhere('user_id', $friendId)->where('friend_id', $userId);
        })->exists();
        
        if ($alreadyFriends) {
            return back()->with('error', 'Sudah menjadi teman');
        }
        
        // Check if request already exists
        $requestExists = FriendRequest::where(function($query) use ($userId, $friendId) {
            $query->where('user_id', $userId)->where('friend_id', $friendId)
                  ->orWhere('user_id', $friendId)->where('friend_id', $userId);
        })->where('status', 'pending')->exists();
        
        if ($requestExists) {
            return back()->with('error', 'Friend request sudah dikirim');
        }
        
        FriendRequest::create([
            'user_id' => $userId,
            'friend_id' => $friendId,
            'status' => 'pending',
            'sent_at' => now(),
        ]);
        
        return back()->with('success', 'Friend request terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage (accept/reject request).
     */
    public function update(Request $request, FriendRequest $friendRequest)
    {
        $action = $request->input('action');
        
        if ($action === 'accept') {
            $friendRequest->update([
                'status' => 'accepted',
                'responded_at' => now(),
            ]);
            
            // Add to friend list (both directions)
            FriendList::create([
                'user_id' => $friendRequest->user_id,
                'friend_id' => $friendRequest->friend_id,
                'created_at' => now(),
            ]);
            
            return back()->with('success', 'Friend request diterima!');
        } else if ($action === 'reject') {
            $friendRequest->update([
                'status' => 'rejected',
                'responded_at' => now(),
            ]);
            
            return back()->with('success', 'Friend request ditolak');
        }
        
        return back()->with('error', 'Action tidak valid');
    }

    /**
     * Remove the specified resource from storage (cancel/delete request).
     */
    public function destroy(FriendRequest $friendRequest)
    {
        $friendRequest->delete();
        return back()->with('success', 'Friend request dihapus');
    }
}
