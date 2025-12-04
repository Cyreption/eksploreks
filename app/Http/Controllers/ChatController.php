<?php

// Author: Nashita Aulia (5026231054)

namespace App\Http\Controllers;

use App\Models\FriendList;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display list of friends for chat
     */
    public function index()
    {
        $userId = session('user_id');
        
        // Get all friends - both where user_id is current user AND where friend_id is current user
        $friends = FriendList::where('user_id', $userId)
            ->orWhere('friend_id', $userId)
            ->with(['friend' => function($query) {
                $query->select('user_id', 'username', 'full_name', 'avatar_url', 'description', 'institution');
            }])
            ->with(['user' => function($query) {
                $query->select('user_id', 'username', 'full_name', 'avatar_url', 'description', 'institution');
            }])
            ->get()
            ->map(function($friendList) use ($userId) {
                // Jika user_id = current user, gunakan friend relationship, sebaliknya gunakan user relationship
                if ($friendList->user_id == $userId) {
                    $friendList->friend_data = $friendList->friend;
                } else {
                    $friendList->friend_data = $friendList->user;
                }
                return $friendList;
            });
        
        return view('connect.chat', ['friends' => $friends]);
    }
    
    /**
     * Open chat room with specific friend
     */
    public function openChat($friendId)
    {
        $userId = session('user_id');
        
        // Check friendship in both directions
        $friendList = FriendList::where(function($q) use ($userId, $friendId) {
            $q->where('user_id', $userId)->where('friend_id', $friendId)
              ->orWhere('user_id', $friendId)->where('friend_id', $userId);
        })
        ->with(['friend', 'user'])
        ->first();
        
        if (!$friendList) {
            return redirect()->route('chat.index')->with('error', 'Friend not found');
        }
        
        // Determine the friend data based on current user
        $friend = $friendList->user_id == $userId ? $friendList->friend : $friendList->user;
        
        // Get messages between user and friend
        $messages = Message::where(function($q) use ($userId, $friendId) {
            $q->where('sender_id', $userId)->where('receiver_id', $friendId)
              ->orWhere('sender_id', $friendId)->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'asc')
        ->get();
        
        return view('connect.chatroom', [
            'friend' => $friend,
            'messages' => $messages,
            'friendId' => $friendId
        ]);
    }
    
    /**
     * Send message
     */
    public function sendMessage(Request $request, $friendId)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);
        
        $userId = session('user_id');
        
        // Create message
        Message::create([
            'sender_id' => $userId,
            'receiver_id' => $friendId,
            'message' => $validated['message'],
            'created_at' => now(),
        ]);
        
        return back()->with('success', 'Message sent!');
    }
    
    /**
     * Search chat
     */
    public function search(Request $request)
    {
        $userId = session('user_id');
        $query = $request->input('q');
        
        // Search in both directions
        $friends = FriendList::where('user_id', $userId)
            ->orWhere('friend_id', $userId)
            ->where(function($q) use ($userId, $query) {
                // Jika user_id adalah current user, cari di friend relationship
                $q->whereHas('friend', function($subQ) use ($query, $userId) {
                    $subQ->where('username', 'like', '%' . $query . '%')
                          ->orWhere('full_name', 'like', '%' . $query . '%');
                })
                // Atau jika friend_id adalah current user, cari di user relationship
                ->orWhereHas('user', function($subQ) use ($query, $userId) {
                    $subQ->where('username', 'like', '%' . $query . '%')
                          ->orWhere('full_name', 'like', '%' . $query . '%');
                });
            })
            ->with(['friend' => function($q) {
                $q->select('user_id', 'username', 'full_name', 'avatar_url', 'description', 'institution');
            }])
            ->with(['user' => function($q) {
                $q->select('user_id', 'username', 'full_name', 'avatar_url', 'description', 'institution');
            }])
            ->get()
            ->map(function($friendList) use ($userId) {
                // Format data sama dengan index method
                if ($friendList->user_id == $userId) {
                    $friendList->friend_data = $friendList->friend;
                } else {
                    $friendList->friend_data = $friendList->user;
                }
                return $friendList;
            });
        
        return view('connect.chat', ['friends' => $friends, 'query' => $query]);
    }
}
