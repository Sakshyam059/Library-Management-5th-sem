<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    
    public function index(){
        return view('admin.index');
    }
    
    public function user(){
        $users=User::all();
        return view('admin.manage_user',compact('users'));
    }

    public function userProfileEdit($id){
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    
    public function userProfileUpdate(Request $request,$id){
        $data=$request->validate([
            'name'=>'required',
            'usertype'=>'',
            'email'=>'required|email'
        ]);
        $user=User::find($id);
        $user->update($data);
        $user->usertype=$request->usertype;
        $user->save();

        return Redirect::route('admin.manage_user')->with('status', 'Role-updated');
    }
    public function userPasswordUpdate(Request $request,$id): RedirectResponse
    {
        $validated = $request->validate([
            'password' => 'required|min:8',
        ]);

        $user=User::find($id);
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
    public function userDelete(Request $request,$id): RedirectResponse
    {
        $user = User::find($id);

        $user->delete();

        return Redirect::route('dashboard');
    }
}
