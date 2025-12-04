<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPost;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = RecruitmentPost::all();

        return view('recruitment.index', compact('recruitments'));
    }

    public function show(RecruitmentPost $recruitment)
    {
        return view('recruitment.show', compact('recruitment'));
    }

    public function create()
    {
        return view('recruitment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'application_link' => 'nullable|url',
            'deadline' => 'nullable|date',
            'file_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/recruitment'), $filename);
            $validated['image'] = 'uploads/recruitment/' . $filename;
        }

        RecruitmentPost::create($validated);

        return redirect()->route('recruitment.index')->with('success', 'Recruitment berhasil dibuat');
    }

    public function edit(RecruitmentPost $recruitmentPost)
    {
        return view('recruitment.edit', compact('recruitmentPost'));
    }

    public function update(Request $request, RecruitmentPost $recruitmentPost)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'application_link' => 'nullable|url',
            'deadline' => 'nullable|date',
            'file_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($recruitmentPost->image && file_exists(public_path($recruitmentPost->image))) {
                unlink(public_path($recruitmentPost->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/recruitment'), $filename);
            $validated['image'] = 'uploads/recruitment/' . $filename;
        }

        $recruitmentPost->update($validated);

        return redirect()->route('recruitment.show', $recruitmentPost)->with('success', 'Recruitment berhasil diupdate');
    }

    public function destroy(RecruitmentPost $recruitmentPost)
    {
        if ($recruitmentPost->image && file_exists(public_path($recruitmentPost->image))) {
            unlink(public_path($recruitmentPost->image));
        }

        $recruitmentPost->delete();

        return redirect()->route('recruitment.index')->with('success', 'Recruitment berhasil dihapus');
    }
}