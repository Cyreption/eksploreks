<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SavedPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavedPlaceSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users or create sample users
        $users = User::inRandomOrder()->limit(5)->get();

        if ($users->isEmpty()) {
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

        $savedPlaces = [
            // User 1 saved places
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 1,
                'saved_at' => now()->subDays(10)
            ],
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 2,
                'saved_at' => now()->subDays(8)
            ],
            [
                'user_id' => $users[0]->user_id ?? 1,
                'place_id' => 5,
                'saved_at' => now()->subDays(5)
            ],
            // User 2 saved places
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 3,
                'saved_at' => now()->subDays(12)
            ],
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 6,
                'saved_at' => now()->subDays(9)
            ],
            [
                'user_id' => $users[1]->user_id ?? 2,
                'place_id' => 8,
                'saved_at' => now()->subDays(3)
            ],
            // User 3 saved places
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 1,
                'saved_at' => now()->subDays(7)
            ],
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 7,
                'saved_at' => now()->subDays(6)
            ],
            [
                'user_id' => $users[2]->user_id ?? 3,
                'place_id' => 10,
                'saved_at' => now()->subDays(2)
            ],
            // User 4 saved places
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 2,
                'saved_at' => now()->subDays(11)
            ],
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 9,
                'saved_at' => now()->subDays(4)
            ],
            [
                'user_id' => $users[3]->user_id ?? 4,
                'place_id' => 12,
                'saved_at' => now()->subDays(1)
            ],
            // User 5 saved places
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 4,
                'saved_at' => now()->subDays(14)
            ],
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 11,
                'saved_at' => now()->subDays(13)
            ],
            [
                'user_id' => $users[4]->user_id ?? 5,
                'place_id' => 13,
                'saved_at' => now()->subDays(6)
            ],
        ];

        foreach ($savedPlaces as $savedPlace) {
            SavedPlace::create($savedPlace);
        }
    }
}
