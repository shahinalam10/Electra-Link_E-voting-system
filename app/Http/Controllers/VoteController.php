<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\VoterId;
use Illuminate\Support\Facades\Session;

class VoteController extends Controller
{
    // Show the voter verification form
    public function showVerifyForm()
    {
        return view('voter.verify');
    }

    // Verify Voter ID and allow access to vote
    public function verifyVoter(Request $request) {
        $request->validate([
            'voter_id' => 'required|numeric|digits_between:5,17'
        ]);

        $voterExists = VoterId::where('voter_id', $request->voter_id)->exists();

        if (!$voterExists) {
            return back()->with('error', 'Invalid Voter ID! Please try again.');
        }

        // Store voter ID in session to track their voting process
        Session::put('voter_verified', $request->voter_id);

        return redirect()->route('vote.create');
    }

    // Show the voting page (Only if verified)
    public function create() {
        if (!Session::has('voter_verified')) {
            return redirect()->route('voter.verify')->with('error', 'Please verify your Voter ID first!');
        }
    
        $candidates = Candidate::all();
        $userVote = Vote::where('voter_id', Session::get('voter_verified'))->first();
    
        return view('user.vote', compact('candidates', 'userVote'));
    }

    // Store the vote
    public function store(Request $request) {
        if (!Session::has('voter_verified')) {
            return response()->json(['message' => 'Voter verification required!'], 403);
        }
    
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id'
        ]);
    
        $voterId = Session::get('voter_verified');
    
        // Ensure voter hasn't voted already
        if (Vote::where('voter_id', $voterId)->exists()) {
            return response()->json(['message' => 'You have already voted!'], 403);
        }
    
        // Store the vote
        Vote::create([
            'voter_id' => $voterId,
            'candidate_id' => $request->candidate_id
        ]);
    
        Candidate::where('id', $request->candidate_id)->increment('votes');
    
        return response()->json(['message' => 'Your vote has been recorded!'], 201);
    }
    
}
