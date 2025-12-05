<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'budi_santoso',
                'email' => 'budi.santoso@example.com',
                'password_hash' => Hash::make('password123'),
                'full_name' => 'Budi Santoso',
                'institution' => 'Universitas Teknologi',
                'department' => 'Informatika',
                'birth_date' => '1995-03-15',
            ],
            [
                'username' => 'siti_nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'password_hash' => Hash::make('password123'),
                'full_name' => 'Siti Nurhaliza',
                'institution' => 'Universitas Negeri',
                'department' => 'Desain Grafis',
                'birth_date' => '1996-07-22',
            ],
            [
                'username' => 'ahmad_dahlan',
                'email' => 'ahmad.dahlan@example.com',
                'password_hash' => Hash::make('password123'),
                'full_name' => 'Ahmad Dahlan',
                'institution' => 'Politeknik',
                'department' => 'Manajemen Bisnis',
                'birth_date' => '1994-11-08',
            ],
            [
                'username' => 'maya_sutrisno',
                'email' => 'maya.sutrisno@example.com',
                'password_hash' => Hash::make('password123'),
                'full_name' => 'Maya Sutrisno',
                'institution' => 'Universitas Swasta',
                'department' => 'Akuntansi',
                'birth_date' => '1997-02-14',
            ],
            [
                'username' => 'roni_wijaya',
                'email' => 'roni.wijaya@example.com',
                'password_hash' => Hash::make('password123'),
                'full_name' => 'Roni Wijaya',
                'institution' => 'Universitas Teknologi',
                'department' => 'Teknik Elektro',
                'birth_date' => '1995-09-28',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
