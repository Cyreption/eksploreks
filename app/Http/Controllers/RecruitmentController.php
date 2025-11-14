<?php
// Created by Aulia Salma Anjani - 5026231063
namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Recruitment::where('is_active', true);
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $recruitments = $query->latest()->get();
        
        return view('recruitment.index', compact('recruitments'));
    }

    public function show(Recruitment $recruitment)
    {
        return view('recruitment.show', compact('recruitment'));
    }
}
