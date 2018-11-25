<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Create role
        // $role = Role::create(['name' => 'admin']);

        // Create Permission
        // $permission = Permission::create(['name' => 'post delete']);

        // Find role
        // $role = Role::findById('4');
        // Find Permission
        // $p = Permission::findById('2');
        // $p1 = Permission::findById('3');
        // $p2 = Permission::findById('1');
        // Assign Permission
        // $role->givePermissionTo($p, $p1, $p2);
        // model permission
        //auth()->user()->givePermissionTo('write post');
        //auth()->user()->givePermissionTo('edit post');
        //auth()->user()->givePermissionTo('delete post');
        //model role
        //auth()->user()->removeRole('publisher');
        //auth()->user()->assignRole('publisher');

        //return auth()->user()->roles;
        //return User::permission('write post')->get();
        //return User::role('writer')->get();
        
        
        if (auth()->user()->hasRole('writer|editor|publisher|admin')){
            // return all post
            $post = Post::paginate(4);
            return view('dashboard')->with('posts', $post);
        }else{
            // return specific users post
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //return view('dashboard')->with('posts', $user->posts);
            $post = Post::paginate(4);
            return view('dashboard')->with('posts', $post);
        }
    }
}
