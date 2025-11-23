<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    private $recruitments = [
        [
            'slug' => 'gd',
            'title' => 'Open Recruitment GD',
            'description' => 'Kami membuka kesempatan bagi kalian yang jago desain grafis untuk bergabung menjadi Graphic Designer resmi kami!',
            'organization' => 'Divisi Kreatif',
            'location' => 'Surabaya',
            'deadline' => '2025-01-15',
            'application_link' => 'https://forms.gle/contoh-gd',
            'file_link' => null, // atau kasih link gambar kalau ada
        ],
        [
            'slug' => 'ms',
            'title' => 'Opeb Recruitment MS',
            'description' => 'Dicari talenta muda yang aktif di media sosial untuk mengelola konten Instagram, TikTok, dan Twitter kami.',
            'organization' => 'Biro Humas',
            'location' => 'Online',
            'deadline' => '2025-01-20',
            'application_link' => 'https://forms.gle/contoh-ms',
            'file_link' => null,
        ],
        // Tambah lagi sesuka hati di sini
    ];

    public function index()
    {
        return view('recruitment.index', [
            'recruitments' => collect($this->recruitments)
        ]);
    }

    public function show($slug)
    {
        $recruitment = collect($this->recruitments)->firstWhere('slug', $slug);

        if (!$recruitment) {
            abort(404);
        }

        // Fake relasi user biar show.blade.php tetap jalan
        $recruitment = (object) array_merge($recruitment, [
            'user' => (object)['full_name' => 'Admin']
        ]);

        return view('recruitment.show', compact('recruitment'));
    }
}