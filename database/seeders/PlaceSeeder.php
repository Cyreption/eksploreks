<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            // Top 3 places
            [
                'name' => 'Aroma Deli Coffee',
                'address' => 'Jalan Raya Puputan No. 88',
                'distance' => '0.8 km',
                'description' => 'Cozy place to enjoy premium coffee, work, or hang out with friends. Great ambiance and friendly staff.',
                'image' => 'hangout/cafe1.jpg',
                'rating' => 4.8,
                'reviews' => 245,
                'is_top' => true,
                'price_rating' => 4.0,
                'location_rating' => 4.8,
                'service_rating' => 4.6,
                'price_range' => '2-5'
            ],
            [
                'name' => 'The Daily Grind',
                'address' => 'Jalan Diponegoro No. 45',
                'distance' => '1.2 km',
                'description' => 'Modern coffee shop with WiFi, perfect for digital nomads. Best latte in town, great vibe.',
                'image' => 'hangout/cafe2.jpg',
                'rating' => 4.7,
                'reviews' => 189,
                'is_top' => true,
                'price_rating' => 4.2,
                'location_rating' => 4.5,
                'service_rating' => 4.7,
                'price_range' => '3-6'
            ],
            [
                'name' => 'Coffee House Corner',
                'address' => 'Jalan Ahmad Yani No. 23',
                'distance' => '1.5 km',
                'description' => 'Cozy cafe with live music events. Perfect for meetings and social hangouts.',
                'image' => 'hangout/cafe3.jpg',
                'rating' => 4.6,
                'reviews' => 156,
                'is_top' => true,
                'price_rating' => 3.8,
                'location_rating' => 4.6,
                'service_rating' => 4.5,
                'price_range' => '2-4'
            ],
            // Regular 10 places
            [
                'name' => 'Bean Street Cafe',
                'address' => 'Jalan Sudirman No. 67',
                'distance' => '2.1 km',
                'description' => 'Vintage-style coffee shop with specialty drinks and pastries.',
                'image' => 'hangout/cafe4.jpg',
                'rating' => 4.5,
                'reviews' => 134,
                'is_top' => false,
                'price_rating' => 4.1,
                'location_rating' => 4.3,
                'service_rating' => 4.4,
                'price_range' => '2-5'
            ],
            [
                'name' => 'Latte Art Studio',
                'address' => 'Jalan Gatot Subroto No. 12',
                'distance' => '2.3 km',
                'description' => 'Artisanal coffee roastery with barista training available.',
                'image' => 'hangout/cafe5.jpg',
                'rating' => 4.4,
                'reviews' => 98,
                'is_top' => false,
                'price_rating' => 4.3,
                'location_rating' => 4.2,
                'service_rating' => 4.3,
                'price_range' => '3-7'
            ],
            [
                'name' => 'Brew & Bloom',
                'address' => 'Jalan Merdeka No. 99',
                'distance' => '2.8 km',
                'description' => 'Garden cafe with plants and flowers. Peaceful atmosphere for relaxation.',
                'image' => 'hangout/cafe6.jpg',
                'rating' => 4.3,
                'reviews' => 87,
                'is_top' => false,
                'price_rating' => 3.9,
                'location_rating' => 4.4,
                'service_rating' => 4.2,
                'price_range' => '2-4'
            ],
            [
                'name' => 'Espresso Haven',
                'address' => 'Jalan Kampus No. 56',
                'distance' => '3.1 km',
                'description' => 'Student-friendly cafe with affordable prices and cozy corners.',
                'image' => 'hangout/cafe7.jpg',
                'rating' => 4.2,
                'reviews' => 76,
                'is_top' => false,
                'price_rating' => 3.5,
                'location_rating' => 4.1,
                'service_rating' => 4.0,
                'price_range' => '1-3'
            ],
            [
                'name' => 'The Coffee Lab',
                'address' => 'Jalan Pejaten Barat No. 34',
                'distance' => '3.4 km',
                'description' => 'Experimental coffee venue with pour-over and cold brew specialties.',
                'image' => 'hangout/cafe8.jpg',
                'rating' => 4.6,
                'reviews' => 112,
                'is_top' => false,
                'price_rating' => 4.4,
                'location_rating' => 4.2,
                'service_rating' => 4.5,
                'price_range' => '3-6'
            ],
            [
                'name' => 'Cafe Nostalgia',
                'address' => 'Jalan Cikini No. 18',
                'distance' => '3.7 km',
                'description' => 'Retro-style cafe with vintage decor and classic coffee recipes.',
                'image' => 'hangout/cafe9.jpg',
                'rating' => 4.1,
                'reviews' => 64,
                'is_top' => false,
                'price_rating' => 3.7,
                'location_rating' => 3.9,
                'service_rating' => 4.1,
                'price_range' => '2-4'
            ],
            [
                'name' => 'Urban Brew Co',
                'address' => 'Jalan Senayan No. 77',
                'distance' => '4.2 km',
                'description' => 'Industrial-style coffee shop with minimalist design and excellent WiFi.',
                'image' => 'hangout/cafe10.jpg',
                'rating' => 4.4,
                'reviews' => 101,
                'is_top' => false,
                'price_rating' => 4.2,
                'location_rating' => 4.0,
                'service_rating' => 4.3,
                'price_range' => '3-5'
            ],
            [
                'name' => 'Cozy Corner Coffee',
                'address' => 'Jalan Bintaro No. 42',
                'distance' => '4.5 km',
                'description' => 'Small intimate cafe perfect for quiet work and meditation.',
                'image' => 'hangout/cafe11.jpg',
                'rating' => 4.0,
                'reviews' => 52,
                'is_top' => false,
                'price_rating' => 3.6,
                'location_rating' => 3.8,
                'service_rating' => 4.0,
                'price_range' => '2-3'
            ],
            [
                'name' => 'Rise & Shine Cafe',
                'address' => 'Jalan Terogong No. 88',
                'distance' => '5.1 km',
                'description' => 'Breakfast and brunch specialist with organic options available.',
                'image' => 'hangout/cafe12.jpg',
                'rating' => 4.3,
                'reviews' => 93,
                'is_top' => false,
                'price_rating' => 4.0,
                'location_rating' => 3.9,
                'service_rating' => 4.2,
                'price_range' => '2-5'
            ],
            [
                'name' => 'The Social Coffee House',
                'address' => 'Jalan Ampera No. 5',
                'distance' => '5.3 km',
                'description' => 'Community cafe with events, workshops, and a vibrant social atmosphere.',
                'image' => 'hangout/cafe13.jpg',
                'rating' => 4.5,
                'reviews' => 178,
                'is_top' => false,
                'price_rating' => 3.8,
                'location_rating' => 4.3,
                'service_rating' => 4.4,
                'price_range' => '2-4'
            ],
        ];

        foreach ($places as $place) {
            Place::create($place);
        }
    }
}
