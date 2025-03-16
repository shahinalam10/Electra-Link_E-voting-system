<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('admin.candidates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'party' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->party = $request->party;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('candidates', 'public');
            $candidate->photo = $path;
        }

        $candidate->save();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Added Successfully!');
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admin.candidates.edit', compact('candidate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'party' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $candidate = Candidate::findOrFail($id);
        $candidate->name = $request->name;
        $candidate->party = $request->party;

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($candidate->photo) {
                Storage::delete('public/' . $candidate->photo);
            }
            // Upload new photo
            $path = $request->file('photo')->store('candidates', 'public');
            $candidate->photo = $path;
        }

        $candidate->save();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Updated Successfully!');
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);

        // Delete photo if exists
        if ($candidate->photo) {
            Storage::delete('public/' . $candidate->photo);
        }

        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate Deleted Successfully!');
    }
}
