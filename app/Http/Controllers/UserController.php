<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //


            public function register(){
            return view('register');
    }

            public function StoreVoters(Request $request){

            $request->validate
            (
                [
            'f_name'=> ['required', 'string', 'max:150'],
            'matric' => ['required', 'string', 'max:150', 'unique:voters,matric'],
            'password'=>['required', 'string', 'max:25'],
            'nacoss_transac_id'=> ['required','string','max:250','unique:voters,nacoss_transac_id',],
            'level'=>['required', 'string'],
            'program'=>['required', 'string'],

        ]);
            $voters = new Voter; 
            $voters->f_name = $request->input('f_name');
            $voters->matric = $request->input('matric');
            $voters->password =Hash::make($request->input('password'));
            $voters->nacoss_transac_id = $request->input('nacoss_transac_id');
            $voters->level = $request->input('level');
            $voters->program = $request->input('program');
            $voters->save();
            return back()->with('success', 'Registration Completed proceed to login');
        }

            public function Dashboard(Request $request){
            $request->validate([
            'matric' => 'required',
            'password' => 'required',
        ]);
            if(Auth::guard('voter')->attempt($request->only(['matric' ,'password'])))
        {
            

            return redirect("/userdash");

        }
            return back()->with('fail', 'Incorrect user credentials.');

        }

            public function UserDash(){
            $voters = Auth::guard('voter')->user();
            return view('user_home', compact('voters'));
        }
    
            public function Profile(){
            $voters = Auth::guard('voter')->user();
            return view('/user_profile', compact('voters'));
        }
            public function HomePage(){
            $voters = Auth::guard('voter')->user();
            return view('/user_home', compact('voters'));
        }
            public function CastVote(){
            $voters = Auth::guard('voter')->user();
            $cast_vote = Aspirant::where('position', 'president')->get();
            $cast_auditor = Aspirant::where('position', 'auditor')->get();
            $cast_finsec = Aspirant::where('position', 'financial secretary')->get();
            $cast_social = Aspirant::where('position', 'social director')->get();



            return view('cast_vote', compact('voters', 'cast_vote','cast_auditor', 'cast_finsec', 'cast_social'));

        } 

            public function SignOutUser(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
            
}
