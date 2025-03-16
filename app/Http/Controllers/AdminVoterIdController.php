<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VoterId;

class AdminVoterIdController extends Controller
{
    public function index()
    {
        $voter_ids = VoterId::orderBy('id', 'asc')->paginate(17); // Change number if needed
        return view('admin.voter_ids', compact('voter_ids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'voter_ids' => 'required|string'
        ]);

        // Split comma-separated voter IDs
        $voterIds = explode(',', $request->voter_ids);
        $voterIds = array_map('trim', $voterIds); // Remove spaces
        $voterIds = array_filter($voterIds); // Remove empty values

        $errors = [];
        $successCount = 0;

        // Validate each voter ID
        foreach ($voterIds as $voterId) {
            // Check if the voter ID is numeric and within the allowed length
            if (!is_numeric($voterId) || strlen($voterId) < 5 || strlen($voterId) > 17) {
                $errors[] = "Invalid voter ID: $voterId (must be 5-17 digits)";
                continue;
            }

            // Check for duplicate voter IDs
            if (VoterId::where('voter_id', $voterId)->exists()) {
                $errors[] = "Voter ID $voterId already exists!";
                continue;
            }

            // If validation passes, insert the voter ID
            VoterId::create(['voter_id' => $voterId]);
            $successCount++;
        }

        // Prepare response messages
        if (!empty($errors)) {
            return back()->with('error', $errors);
        }

        return back()->with('success', "$successCount voter IDs added successfully!");
    }

    public function destroy($id)
    {
        VoterId::destroy($id);
        return back()->with('success', 'Voter ID deleted successfully!');
    }

    public function bulkDelete(Request $request)
    {
        // Validate the request
        $request->validate([
            'selected_ids' => 'required|array', // Ensure selected_ids is an array
            'selected_ids.*' => 'exists:voter_ids,id' // Ensure each ID exists in the database
        ]);

        // Delete the selected voter IDs
        VoterId::whereIn('id', $request->selected_ids)->delete();

        return back()->with('success', 'Selected voter IDs deleted successfully!');
    }

    public function search(Request $request)
    {
        // Validate the search input
        $request->validate([
            'search' => 'required|string|max:17' // Ensure the search term is valid
        ]);

        // Get the search term from the input
        $searchTerm = $request->input('search');

        // Search for the voter ID in the database
        $voter = VoterId::where('voter_id', $searchTerm)->first();

        // Check if the voter ID exists
        if ($voter) {
            return back()->with('search_result', "Voter ID '$searchTerm' found!");
        } else {
            return back()->with('search_result', "Voter ID '$searchTerm' not found!");
        }
    }
}