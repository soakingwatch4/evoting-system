<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function index ()
    {
        $voters= Voter::all(); //Fetch all registered voters
        return view('voters.index',compact('voters'));
    }
}
