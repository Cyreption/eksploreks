<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecruitmentController extends Controller
{
    public function index()
    {
        $recruitments = RecruitmentPost::all();

        return view('recruitment.index', compact('recruitments'));
    }

    public function show($id)
    {
        $recruitment = RecruitmentPost::where('recruitment_id', $id)->firstOrFail();

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
            $validated['image'] = $request->file('image')->store('recruitment', 'public');
        }

        RecruitmentPost::create($validated);

        return redirect()->route('recruitment.index')->with('success', 'Recruitment berhasil dibuat');
    }

    public function edit($id)
    {
        $recruitmentPost = RecruitmentPost::where('recruitment_id', $id)->firstOrFail();
        return view('recruitment.edit', compact('recruitmentPost'));
    }

    public function update(Request $request, $id)
    {
        $recruitmentPost = RecruitmentPost::where('recruitment_id', $id)->firstOrFail();
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
            if ($recruitmentPost->image) {
                Storage::disk('public')->delete($recruitmentPost->image);
            }
            $validated['image'] = $request->file('image')->store('recruitment', 'public');
        }

        $recruitmentPost->update($validated);

        return redirect()->route('recruitment.show', $recruitmentPost->recruitment_id)->with('success', 'Recruitment berhasil diupdate');
    }

    public function destroy($id)
    {
        $recruitmentPost = RecruitmentPost::where('recruitment_id', $id)->firstOrFail();
        if ($recruitmentPost->image) {
            Storage::disk('public')->delete($recruitmentPost->image);
        }

        $recruitmentPost->delete();

        return redirect()->route('recruitment.index')->with('success', 'Recruitment berhasil dihapus');
    }
}