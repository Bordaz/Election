<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Adminlogin(){
        return view('admin.login');
    }

    public function LoginAdmin(Request $request){
         $request->validate([
            'username'=> 'required',
            'password'=>'required',
        ]);
        if(Auth::guard('admin')->attempt($request->only(['username', 'password'])));
        {
        
            return redirect('/dash');

        }
        return back()->with('fail', 'Incorrect user credentials.');

    }

    public function AdminDashboard(){
        $admin = Auth::guard('admin')->user();
        return view('admin.admin_home', compact('admin'));
    }
    public function AddAspirant(Request $request){
        $request->validate([
            'f_name'=> ['required', 'string', 'max:250'],
            'position'=>['required','string','max:250'],
        ]);

        $adspirant = new Aspirant;
        if($file = $request->file('dp'))
        {
            $name = time().$file->getClientOriginalname();
            $file->move('images', $name);
            $adspirant->dp = $name;
        }

        $adspirant->f_name = $request->input('f_name');   
        $adspirant->position = $request->input('position');
        $adspirant->save();
        return back()->with('success', 'Aspirant Created Successful');  
    }
    public function LogoutAdmin(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');

    }
}
