<?php

// Author: Satria Pinandita (5026231004)

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * All hangout places data from database
     */
    private function getAllPlaces()
    {
        return Place::all()->toArray();
    }

    /**
     * Display hangout index with top 3 and all places
     */
    public function hangout()
    {
        $places = $this->getAllPlaces();
        $topPlaces = array_filter($places, fn($p) => $p['is_top'] === true);
        $otherPlaces = array_filter($places, fn($p) => $p['is_top'] === false);

        return view('hangout.index', compact('topPlaces', 'otherPlaces', 'places'));
    }

    /**
     * Display hangout detail for a specific place
     */
    public function hangoutDetail($id)
    {
        $place = Place::find($id);

        if (!$place) {
            return redirect()->route('hangout')->with('error', 'Tempat tidak ditemukan.');
        }

        // Check if place is liked
        $likedPlaces = session('liked_places', []);
        $isLiked = in_array($id, $likedPlaces);

        // Get reviews from database
        $comments = Review::where('place_id', $id)
            ->with('user')
            ->orderByDesc('created_at')
            ->get()
            ->map(fn($review) => [
                'name' => $review->user->full_name ?? $review->user->username,
                'text' => $review->comment,
                'rating' => $review->rating,
                'time' => $review->created_at->diffForHumans()
            ])
            ->toArray();

        return view('hangout.detail', compact('place', 'isLiked', 'comments'));
    }

    /**
     * Toggle like/unlike a place
     */
    public function toggleLike($id)
    {
        $likedPlaces = session('liked_places', []);
        
        if (in_array($id, $likedPlaces)) {
            // Unlike
            $likedPlaces = array_diff($likedPlaces, [$id]);
            $message = 'Cafe removed from liked list.';
        } else {
            // Like
            $likedPlaces[] = $id;
            $message = 'Cafe added to liked list.';
        }

        session(['liked_places' => array_values($likedPlaces)]);

        return response()->json([
            'success' => true,
            'isLiked' => in_array($id, $likedPlaces),
            'message' => $message,
            'likedCount' => count($likedPlaces)
        ]);
    }

    /**
     * Display liked places list
     */
    public function likedList()
    {
        $likedPlaces = session('liked_places', []);

        $cafes = [];
        if (is_array($likedPlaces) && count($likedPlaces) > 0) {
            $cafes = Place::whereIn('place_id', $likedPlaces)->get()->toArray();
        }

        return view('liked.index', compact('cafes'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }

    /**
     * Store a new review for a place
     */
    public function storeReview(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500',
        ]);

        // Check if user is logged in
        if (!session('user_id')) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        // Create review
        try {
            $now = now();
            $review = Review::create([
                'user_id' => session('user_id'),
                'place_id' => $id,
                'rating' => $validated['rating'],
                'comment' => $validated['comment'],
                'created_at' => $now,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Review berhasil ditambahkan!',
                'review' => [
                    'review_id' => $review->review_id,
                    'user_name' => session('user.full_name') ?? session('user.username') ?? 'Anonymous',
                    'comment' => $review->comment,
                    'rating' => $review->rating,
                    'created_at' => $now->diffForHumans(),
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan review: ' . $e->getMessage()
            ], 500);
        }
    }
}
