<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Review;
use App\Models\SavedPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample users for reviews
        $users = User::inRandomOrder()->limit(5)->get();

        if ($users->isEmpty()) {
            // Create sample users if none exist
            $users = [];
            $names = ['Budi Santoso', 'Siti Nurhaliza', 'Ahmad Dahlan', 'Maya Sutrisno', 'Roni Wijaya'];
            foreach ($names as $name) {
                $users[] = User::create([
                    'username' => strtolower(str_replace(' ', '_', $name)),
                    'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                    'password_hash' => bcrypt('password'),
                    'full_name' => $name,
                    'institution' => 'Universitas Teknologi',
                    'department' => 'Informatika',
                    'birth_date' => '1995-01-01',
                ]);
            }
        }

        $reviews = [
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 1,
                'rating' => 5,
                'comment' => 'Great coffee and cozy atmosphere! Perfect for studying and hanging out with friends.',
                'created_at' => now()->subDays(2)
            ],
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 1,
                'rating' => 4,
                'comment' => 'Very friendly staff and nice decoration. Will definitely come back here!',
                'created_at' => now()->subDays(5)
            ],
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 2,
                'rating' => 5,
                'comment' => 'Best latte in town! Modern place with good WiFi for working.',
                'created_at' => now()->subDays(1)
            ],
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 2,
                'rating' => 4,
                'comment' => 'Excellent service and delicious drinks. Highly recommended!',
                'created_at' => now()->subDays(7)
            ],
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 3,
                'rating' => 5,
                'comment' => 'Love the ambiance here! They have live music events which is awesome.',
                'created_at' => now()->subDays(3)
            ],
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 4,
                'rating' => 4,
                'comment' => 'Vintage-style cafe with great specialty drinks. Must visit!',
                'created_at' => now()->subDays(4)
            ],
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 5,
                'rating' => 5,
                'comment' => 'Artisanal coffee at its finest! Barista is very knowledgeable.',
                'created_at' => now()->subDays(6)
            ],
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 6,
                'rating' => 4,
                'comment' => 'Beautiful garden cafe with lots of plants. Perfect for relaxation.',
                'created_at' => now()->subDays(8)
            ],
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 7,
                'rating' => 4,
                'comment' => 'Student-friendly with affordable prices. Great study spot!',
                'created_at' => now()->subDays(9)
            ],
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 8,
                'rating' => 5,
                'comment' => 'Experimental pour-over coffee is absolutely delicious! Worth trying.',
                'created_at' => now()->subDays(10)
            ],
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 9,
                'rating' => 4,
                'comment' => 'Retro cafe with vintage vibes. Nice place to hang out.',
                'created_at' => now()->subDays(11)
            ],
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 10,
                'rating' => 4,
                'comment' => 'Modern industrial design with excellent WiFi. Perfect for remote work.',
                'created_at' => now()->subDays(12)
            ],
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 11,
                'rating' => 4,
                'comment' => 'Small and intimate, perfect for quiet work and meditation.',
                'created_at' => now()->subDays(13)
            ],
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 12,
                'rating' => 5,
                'comment' => 'Breakfast and brunch specialist! Organic options are amazing.',
                'created_at' => now()->subDays(14)
            ],
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 13,
                'rating' => 5,
                'comment' => 'Community cafe with great events and workshops. Awesome place!',
                'created_at' => now()->subDays(15)
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
