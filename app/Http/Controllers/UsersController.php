<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')){
            // return all user
            $user = User::paginate(4);
            return view('users.users')->with('users', $user);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->hasRole('admin')){
            // as you are not editor or admin, only see post
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required'
        ]);

        // Create Post
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Find user role
        $u_role_st = $user->getRoleNames();
        $u_role = preg_replace("/[^a-zA-Z0-9]+/", "", $u_role_st);
        // Remove role
        $user->removeRole($u_role);
        // Set new role
        $role_st = $request->input('role');
        $role = preg_replace("/[^a-zA-Z0-9]+/", "", $role_st);
        $user->assignRole($role);
        
        $user->save();

        return redirect('/users')->with('success', 'User info has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update password the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function passreset($id)
    {
        $user = User::find($id);
        $pass = 'secret';
        $user->password = Hash::make($pass);
        $user->save();

        return redirect('/users')->with('success', 'Password has been changed to secret');
    }
}
