<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function userDetail(Request $request){
        $detail=$request->all();
        $user=UserDetail::where('user_id','=',request()->user()->id)->get();
        $user_id=request()->user()->id;
        $detail['user_id']=$user_id;
        if(count($user)==0){
            if($request->file('image')){
                $file =$request->file('image');
                $fileName=$file->getClientOriginalName();
                $imagepath=time().'_'.$fileName;
                $file->move(public_path('images/profile/'),$imagepath);
                $detail['image']=$imagepath;
            }
           
            UserDetail::create($detail);

        }else{  
            $data=UserDetail::find($user_id);
            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $image=time().'_'.$filename;
                $file->move(public_path('/images/profile/'),$image);
                File::delete(public_path('/images/profile/'.$data->image));
                $detail['image']=$image;
                
            }
        
            $data->update($detail);
        }
        return Redirect::back();

    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
