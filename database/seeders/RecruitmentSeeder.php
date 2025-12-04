<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecruitmentPost;

class RecruitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecruitmentPost::create([
            'title' => 'Open Recruitment GD',
            'description' => 'Kami sedang mencari Graphic Designer berbakat untuk bergabung bersama tim kreatif kami. Kalian akan bertugas membuat poster, feed Instagram, thumbnail YouTube, dan berbagai konten visual lainnya.',
            'organization' => 'Divisi Kreatif',
            'location' => 'Surabaya',
            'deadline' => '2025-01-15',
            'application_link' => 'https://forms.gle/contoh-gd',
            'file_link' => null,
            'image' => 'uploads/recruitment/GD-recruitment.jpg',
        ]);

        RecruitmentPost::create([
            'title' => 'Open Recruitment MS',
            'description' => 'Dicari talenta muda yang aktif dan kreatif untuk mengelola akun media sosial resmi kampus. Tugas utama: membuat konten harian, story, reels, dan berinteraksi dengan followers.',
            'organization' => 'Biro Humas',
            'location' => 'Online',
            'deadline' => '2025-01-20',
            'application_link' => 'https://forms.gle/contoh-ms',
            'file_link' => null,
            'image' => 'uploads/recruitment/MS-recruitment.png',
        ]);
    }
}