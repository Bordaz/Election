<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use Illuminate\Http\Request;

class AspirantController extends Controller
{
    //
            public function ViewAspirant(){
            $view_all = Aspirant::paginate(5);
            return view('admin.all_aspirant', compact('view_all'));
        }

            public function EditAspirant($id){
            $view_aspirant = Aspirant::find($id);
            return view('admin.edit_aspirant', compact('view_aspirant'));
            }


            public function UpdateAspirant(Request $request, $id){
            $request->validate([

            'f_name' => ['required', 'string', 'max:250'],
            'position' => ['required', 'string', 'max:250'],
     ]);
             $aspirant = Aspirant::find($id);
        
            if($file = $request->file('dp'))
            {
                $name = time().$file->getClientOriginalname();
                $file->move('images', $name);
                $aspirant->dp = $name;
            }

            $aspirant->f_name = $request->input('f_name');
            $aspirant->position = $request->input('position');
            $aspirant->save();
            return redirect()->route('admin.view_aspirant')->with('success', 'Aspirant Updated Successfull');  
        }

            public function DeleteAspirant($id){
                $aspirant = Aspirant::find($id);
                $aspirant->delete();
                // the unlink() is used to delete the user uploaded image from the project file
                // the normal delete() will only delte the user from the table but the image wont be deleted from the project folder 
                @unlink(public_path($aspirant->dp));
                
                return redirect()->route('admin.view_aspirant')->with('success', 'Aspirant Account Delted Successfully');

        }

            public function ViewVotes(){
                $votes = Aspirant::all();
                return view('admin.votes', compact('votes'));
            }


      

}
