<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * All hangout places data
     */
    private function getAllPlaces()
    {
        return [
            // Top 3 places
            [
                'id' => 1,
                'name' => 'Aroma Deli Coffee',
                'address' => 'Jalan Raya Puputan No. 88',
                'distance' => '0.8 km',
                'image' => 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?w=600&h=400&fit=crop',
                'description' => 'Cozy place to enjoy premium coffee, work, or hang out with friends. Great ambiance and friendly staff.',
                'rating' => 4.8,
                'reviews' => 245,
                'is_top' => true,
                'price_rating' => 4.0,
                'location_rating' => 4.8,
                'service_rating' => 4.6
            ],
            [
                'id' => 2,
                'name' => 'The Daily Grind',
                'address' => 'Jalan Diponegoro No. 45',
                'distance' => '1.2 km',
                'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=600&h=400&fit=crop',
                'description' => 'Modern coffee shop with WiFi, perfect for digital nomads. Best latte in town, great vibe.',
                'rating' => 4.7,
                'reviews' => 189,
                'is_top' => true,
                'price_rating' => 4.2,
                'location_rating' => 4.5,
                'service_rating' => 4.7
            ],
            [
                'id' => 3,
                'name' => 'Coffee House Corner',
                'address' => 'Jalan Ahmad Yani No. 23',
                'distance' => '1.5 km',
                'image' => 'https://images.unsplash.com/photo-1501339847302-ac426a36c86d?w=600&h=400&fit=crop',
                'description' => 'Cozy cafe with live music events. Perfect for meetings and social hangouts.',
                'rating' => 4.6,
                'reviews' => 156,
                'is_top' => true,
                'price_rating' => 3.8,
                'location_rating' => 4.6,
                'service_rating' => 4.5
            ],
            // Regular 10 places
            [
                'id' => 4,
                'name' => 'Bean Street Cafe',
                'address' => 'Jalan Sudirman No. 67',
                'distance' => '2.1 km',
                'image' => 'https://images.unsplash.com/photo-1442512595331-e89e6e893643?w=600&h=400&fit=crop',
                'description' => 'Vintage-style coffee shop with specialty drinks and pastries.',
                'rating' => 4.5,
                'reviews' => 134,
                'is_top' => false,
                'price_rating' => 4.1,
                'location_rating' => 4.3,
                'service_rating' => 4.4
            ],
            [
                'id' => 5,
                'name' => 'Latte Art Studio',
                'address' => 'Jalan Gatot Subroto No. 12',
                'distance' => '2.3 km',
                'image' => 'https://images.unsplash.com/photo-1453614512568-c4024d13c247?w=600&h=400&fit=crop',
                'description' => 'Artisanal coffee roastery with barista training available.',
                'rating' => 4.4,
                'reviews' => 98,
                'is_top' => false,
                'price_rating' => 4.3,
                'location_rating' => 4.2,
                'service_rating' => 4.3
            ],
            [
                'id' => 6,
                'name' => 'Brew & Bloom',
                'address' => 'Jalan Merdeka No. 99',
                'distance' => '2.8 km',
                'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop',
                'description' => 'Garden cafe with plants and flowers. Peaceful atmosphere for relaxation.',
                'rating' => 4.3,
                'reviews' => 87,
                'is_top' => false,
                'price_rating' => 3.9,
                'location_rating' => 4.4,
                'service_rating' => 4.2
            ],
            [
                'id' => 7,
                'name' => 'Espresso Haven',
                'address' => 'Jalan Kampus No. 56',
                'distance' => '3.1 km',
                'image' => 'https://images.unsplash.com/photo-1454392412519-3346ce6be7de?w=600&h=400&fit=crop',
                'description' => 'Student-friendly cafe with affordable prices and cozy corners.',
                'rating' => 4.2,
                'reviews' => 76,
                'is_top' => false,
                'price_rating' => 3.5,
                'location_rating' => 4.1,
                'service_rating' => 4.0
            ],
            [
                'id' => 8,
                'name' => 'The Coffee Lab',
                'address' => 'Jalan Pejaten Barat No. 34',
                'distance' => '3.4 km',
                'image' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?w=600&h=400&fit=crop',
                'description' => 'Experimental coffee venue with pour-over and cold brew specialties.',
                'rating' => 4.6,
                'reviews' => 112,
                'is_top' => false,
                'price_rating' => 4.4,
                'location_rating' => 4.2,
                'service_rating' => 4.5
            ],
            [
                'id' => 9,
                'name' => 'Cafe Nostalgia',
                'address' => 'Jalan Cikini No. 18',
                'distance' => '3.7 km',
                'image' => 'https://images.unsplash.com/photo-1493857671505-72967e2e2760?w=600&h=400&fit=crop',
                'description' => 'Retro-style cafe with vintage decor and classic coffee recipes.',
                'rating' => 4.1,
                'reviews' => 64,
                'is_top' => false,
                'price_rating' => 3.7,
                'location_rating' => 3.9,
                'service_rating' => 4.1
            ],
            [
                'id' => 10,
                'name' => 'Urban Brew Co',
                'address' => 'Jalan Senayan No. 77',
                'distance' => '4.2 km',
                'image' => 'https://images.unsplash.com/photo-1488269865594-e42ba057caa1?w=600&h=400&fit=crop',
                'description' => 'Industrial-style coffee shop with minimalist design and excellent WiFi.',
                'rating' => 4.4,
                'reviews' => 101,
                'is_top' => false,
                'price_rating' => 4.2,
                'location_rating' => 4.0,
                'service_rating' => 4.3
            ],
            [
                'id' => 11,
                'name' => 'Cozy Corner Coffee',
                'address' => 'Jalan Bintaro No. 42',
                'distance' => '4.5 km',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=600&h=400&fit=crop',
                'description' => 'Small intimate cafe perfect for quiet work and meditation.',
                'rating' => 4.0,
                'reviews' => 52,
                'is_top' => false,
                'price_rating' => 3.6,
                'location_rating' => 3.8,
                'service_rating' => 4.0
            ],
            [
                'id' => 12,
                'name' => 'Rise & Shine Cafe',
                'address' => 'Jalan Terogong No. 88',
                'distance' => '5.1 km',
                'image' => 'https://images.unsplash.com/photo-1500090736941-2e16760ff287?w=600&h=400&fit=crop',
                'description' => 'Breakfast and brunch specialist with organic options available.',
                'rating' => 4.3,
                'reviews' => 93,
                'is_top' => false,
                'price_rating' => 4.0,
                'location_rating' => 3.9,
                'service_rating' => 4.2
            ],
            [
                'id' => 13,
                'name' => 'The Social Coffee House',
                'address' => 'Jalan Ampera No. 5',
                'distance' => '5.3 km',
                'image' => 'https://images.unsplash.com/photo-1505778276668-fc0fbb0e0c30?w=600&h=400&fit=crop',
                'description' => 'Community cafe with events, workshops, and a vibrant social atmosphere.',
                'rating' => 4.5,
                'reviews' => 178,
                'is_top' => false,
                'price_rating' => 3.8,
                'location_rating' => 4.3,
                'service_rating' => 4.4
            ],
        ];
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
        $places = $this->getAllPlaces();
        $place = collect($places)->firstWhere('id', $id);

        if (!$place) {
            return redirect()->route('hangout')->with('error', 'Tempat tidak ditemukan.');
        }

        // Check if place is liked
        $likedPlaces = session('liked_places', []);
        $isLiked = in_array($id, $likedPlaces);

        // Generate random comments
        $commentNames = [
            'Mas Rusdi', 'Mas Gatot', 'Mas Amba', 'Toto Wolf', 'Lewis Hamilton',
            'Siti Nurhaliza', 'Dita Karang', 'Ahmad Dahlan', 'Maya Sutrisno', 'Budi Santoso',
            'Ani Wijaya', 'Roni Wijaya', 'Citra Dewi', 'Indra Kusuma', 'Putri Arista'
        ];
        
        $comments = [];
        $timesAgo = ['2 days ago', '1 week ago', '3 weeks ago', '1 month ago', '5 days ago'];
        
        for ($i = 0; $i < 5; $i++) {
            $comments[] = [
                'name' => $commentNames[array_rand($commentNames)],
                'text' => [
                    'Great coffee and cozy atmosphere!',
                    'Best place for latte and work!',
                    'Perfect spot for meetings and hangouts!',
                    'Love the ambiance here, highly recommended!',
                    'Excellent service and delicious drinks!',
                    'Must visit cafe in the area!',
                    'Perfect for studying and relaxing!',
                    'Very friendly staff and nice decoration!'
                ][rand(0, 7)],
                'time' => $timesAgo[array_rand($timesAgo)]
            ];
        }

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
        $allPlaces = $this->getAllPlaces();
        $likedPlaces = session('liked_places', []);

        $cafes = [];
        if (is_array($likedPlaces) && count($likedPlaces) > 0) {
            foreach ($allPlaces as $place) {
                if (in_array($place['id'], $likedPlaces)) {
                    $cafes[] = $place;
                }
            }
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
}
