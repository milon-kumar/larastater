<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('layouts.backend.profile.view',[
            'user'=>$user,
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('layouts.backend.profile.edit_form',[
            'user'=>$user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'avatar'=>'nullable|image',
        ]);

        $user = Auth::user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        if ($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avater');
        }

        notify()->success('Profile Update Successfully','Success');
        return back();

    }

    public function passwordChange()
    {
        return view('layouts.backend.password.index');
    }

    public function PasswordUpdate(Request $request)
    {
        $this->validate($request,[
           'old_password'=>'required',
           'new_password'=>'required',
           'con_password'=>'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password,$user->password)){

            if (!Hash::check($request->new_password,$user->password)){
                if ($request->new_password==$request->con_password){
                    $user->update([
                        'password'=>Hash::make($request->new_password),
                    ]);
                    Auth::logout();
                    notify()->success('Password Changed Successfully');
                    return redirect()->route('login');
                }else{
                    notify()->warning('New Password And Conform Password Are Not Same','Warning');
                }

            }else{
                notify()->warning('New Password Can Not Be Same As Old Password','Warning');
            }
        }else{
            notify()->error('Old Password Is Not Match','Error');
        }
        return  redirect()->back();
    }
}
