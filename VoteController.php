<?php
namespace App\Http\Controllers; // Add this line

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'position' => 'required|string',
        ]);

        $voter = auth()->user(); // Assuming the voter is logged in

        // Check if voter has already voted for this position
        if (Vote::where('voter_id', $voter->id)->where('position', $request->position)->exists()) {
            return back()->with('error', 'You have already voted for this position.');
        }

        // Save the vote
        Vote::create([
            'voter_id' => $voter->id,
            'candidate_id' => $request->candidate_id,
            'position' => $request->position,
        ]);

        return back()->with('success', 'Your vote has been cast successfully!');
    }
}