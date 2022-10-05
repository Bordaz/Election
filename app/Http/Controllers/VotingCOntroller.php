<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingCOntroller extends Controller
{
    //
    public function Vote(Request $request){
        $request->validate([
            'president' => ['required'],
            'finsec' => ['required'],
            'social' => ['required'],
            'auditor' => ['required'],
        ]);

       $voter =  Auth::guard('voter')->user();
        $voter->voting()->saveMany([
            new Voting(['aspirant_id' => $request->president]),
            new Voting(['aspirant_id' => $request->finsec]),
            new Voting(['aspirant_id' => $request->social]),
            new Voting(['aspirant_id' => $request->auditor]),
            ]);
      return  back()->with('success', 'you have successfully voted');
        
    }
}
