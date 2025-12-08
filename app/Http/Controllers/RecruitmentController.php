<?php

// Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060)

namespace App\Http\Controllers;

use App\Models\RecruitmentPost;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of recruitment posts with optional search.
     */
    public function listRecruitments(Request $request)
    {
        $searchQuery = trim($request->query('q', ''));

        $recruitments = RecruitmentPost::query()
            ->when($searchQuery !== '', function ($query) use ($searchQuery) {
                $term = '%' . mb_strtolower($searchQuery, 'UTF-8') . '%';
                $query->whereRaw('LOWER(title) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(organization) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$term]);
            })
            ->get();

        return view('recruitment.index', compact('recruitments', 'searchQuery'));
    }

    /**
     * Display the specified recruitment post.
     */
    public function showRecruitment(RecruitmentPost $recruitment)
    {
        return view('recruitment.show', compact('recruitment'));
    }

    /**
     * Show the form for creating a new recruitment post.
     */
    public function createRecruitment()
    {
        return view('recruitment.create');
    }

    /**
     * Store a newly created recruitment post in storage.
     */
    public function storeRecruitment(Request $request)
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

    /**
     * Show the form for editing the specified recruitment post.
     */
    public function editRecruitment(RecruitmentPost $recruitmentPost)
    {
        return view('recruitment.edit', compact('recruitmentPost'));
    }

    /**
     * Update the specified recruitment post in storage.
     */
    public function updateRecruitment(Request $request, RecruitmentPost $recruitmentPost)
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

    /**
     * Remove the specified recruitment post from storage.
     */
    public function deleteRecruitment(RecruitmentPost $recruitmentPost)
    {
        if ($recruitmentPost->image && file_exists(public_path($recruitmentPost->image))) {
            unlink(public_path($recruitmentPost->image));
        }

        $recruitmentPost->delete();

        return redirect()->route('recruitment.index')->with('success', 'Recruitment berhasil dihapus');
    }

    /**
     * Search recruitment posts by title, organization, or description.
     * This method handles AJAX requests for real-time search.
     */
    public function searchRecruitments(Request $request)
    {
        $searchQuery = trim($request->query('q', ''));

        $recruitments = RecruitmentPost::query()
            ->when($searchQuery !== '', function ($query) use ($searchQuery) {
                $term = '%' . mb_strtolower($searchQuery, 'UTF-8') . '%';
                $query->whereRaw('LOWER(title) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(organization) LIKE ?', [$term])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$term]);
            })
            ->get();

        return response()->json([
            'success' => true,
            'data' => $recruitments,
        ]);
    }
}