<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.users.index');
        $users = User::all();
        return view('layouts.backend.users.index',[
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.users.create');
        $roles = Role::all();
        return view('layouts.backend.users.form',[
            'roles'=>$roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        Gate::authorize('app.users.create');
        $this->validate($request,[
           'name'       =>'required|string|max:255',
           'email'      =>'required|email|max:255,unique:user',
           'role'       =>'required',
           'password'   =>'required|confirmed|min:8',
            'avater'    =>'required|image',
        ]);

        $user = User::create([
            'role_id'   =>$request->role,
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>Hash::make($request->password),
            'status'=>$request->filled('status'),
        ]);
        if ($request->hasFile('avater')){
            $user->addMedia($request->avater)->toMediaCollection('avater');
        }
        notify()->success('User Added Successfully','Success');
        return redirect()->route('app.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('app.users.index');
        return view('layouts.backend.users.show',[
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('app.users.edit');
        $roles = Role::all();
        return view('layouts.backend.users.form',[
        'roles'=>$roles,
            'user'=>$user,
    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        return $request->all();
        Gate::authorize('app.users.edit');
        $this->validate($request,[
            'name'       =>'required|string|max:255',
            'email'      =>'required|email|max:255,unique:user',
            'role'       =>'required',
            'password'   =>'nullable|confirmed|min:8',
            'avater'    =>'nullable|image',
        ]);

        $user->update([
            'role_id'   =>$request->role,
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>isset($request->password) ? Hash::make($request->password) : $user->password,
            'status'=>$request->filled('status'),
        ]);
        if ($request->hasFile('avater')){
            $user->addMedia($request->avater)->toMediaCollection('avater');
        }
        notify()->success('User Updated Successfully','Success');
        return redirect()->route('app.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
