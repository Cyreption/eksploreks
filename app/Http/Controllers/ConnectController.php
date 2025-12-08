<?php

// Author: Nashita Aulia (5026231054)

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendList;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    /**
     * Display connect page with suggestions.
     */
    public function index()
    {
        $userId = session('user_id');
        
        // Get all users except current user and already friends
        $friendIds = FriendList::where('user_id', $userId)->pluck('friend_id')->toArray();
        
        // Get pending request IDs (sent by current user)
        $pendingRequestIds = FriendRequest::where('user_id', $userId)
            ->where('status', 'pending')
            ->pluck('friend_id')
            ->toArray();
        
        // Get all users not in friend list and no pending request
        $suggestions = User::where('user_id', '!=', $userId)
            ->whereNotIn('user_id', $friendIds)
            ->whereNotIn('user_id', $pendingRequestIds)
            ->get();
        
        return view('connect.connect', ['suggestions' => $suggestions]);
    }
    
    /**
     * Show add friend page with specific user.
     */
    public function showAddFriend($userId)
    {
        $user = User::findOrFail($userId);
        return view('connect.addfriend', ['user' => $user]);
    }
    
    /**
     * Show stranger profile (non-friend).
     */
    public function showStrangerProfile($userId)
    {
        $stranger = User::findOrFail($userId);
        $currentUserId = session('user_id');
        
        // Check if request already sent
        $requestSent = FriendRequest::where('user_id', $currentUserId)
            ->where('friend_id', $userId)
            ->where('status', 'pending')
            ->exists();
        
        return view('connect.strangerprofile', ['stranger' => $stranger, 'requestSent' => $requestSent]);
    }
    
    /**
     * Search users.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $userId = session('user_id');
        
        $results = [];
        if (!empty($query)) {
            $results = User::where(function($q) use ($query) {
                $q->where('username', 'like', '%' . $query . '%')
                  ->orWhere('full_name', 'like', '%' . $query . '%')
                  ->orWhere('institution', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%');
            })
            ->where('user_id', '!=', $userId)
            ->get();
        }
        
        return view('connect.search', ['users' => $results, 'query' => $query]);
    }
}
