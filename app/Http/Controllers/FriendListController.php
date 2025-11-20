<?php

namespace App\Http\Controllers;

use App\Models\FriendList;
use App\Models\FriendRequest;
use Illuminate\Http\Request;

class FriendListController extends Controller
{
    /**
     * Display a listing of the resource (friend list).
     */
    public function index()
    {
        $userId = session('user_id');
        $friends = FriendList::where('user_id', $userId)
            ->with('friend')
            ->get();
        
        return view('connect.connect', ['friends' => $friends]);
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
