<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\VoterId;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all candidates with their votes
        $candidates = Candidate::all();
    
        // Calculate total votes
        $totalVotes = $candidates->sum('votes');
    
        // Calculate total voter count
        $totalVoters = VoterId::count();
    
        // Calculate percentage of votes compared to total voters
        $totalVotesPercentage = $totalVoters > 0 ? round(($totalVotes / $totalVoters) * 100, 2) : 0;
    
        // Calculate percentage of votes for each candidate
        $candidates->each(function ($candidate) use ($totalVotes) {
            $candidate->vote_percentage = $totalVotes > 0 ? round(($candidate->votes / $totalVotes) * 100, 2) : 0;
        });
    
        // Pass data to the view
        return view('admin.dashboard', compact('candidates', 'totalVotes', 'totalVoters', 'totalVotesPercentage'));
    }

    public function getVotes()
    {
        // Fetch all candidates with their votes
        $candidates = Candidate::all();
    
        // Calculate total votes
        $totalVotes = $candidates->sum('votes');
    
        // Calculate total voter count
        $totalVoters = VoterId::count();
    
        // Calculate percentage of votes for each candidate
        $candidates->each(function ($candidate) use ($totalVotes) {
            $candidate->vote_percentage = $totalVotes > 0 ? round(($candidate->votes / $totalVotes) * 100, 2) : 0;
        });
    
        // Return JSON response
        return response()->json([
            'candidates' => $candidates,
            'totalVotes' => $totalVotes,
            'totalVoters' => $totalVoters // Include totalVoters in the response
        ]);
    }
}