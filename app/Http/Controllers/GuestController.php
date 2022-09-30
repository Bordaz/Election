<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function GuestLogin(){
        return view('user_login');
    }
    public function GuestRegister(){
        return view('register');
    }
}
