<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $data = User::with('roles')->get();
        return Inertia::render('Users/Index', ['data' => $data]);
    }

    
    public function create()
    {
        $roles = Role::all();

         return Inertia::render('Users/UserCreate')
         ->with('roles', $roles);
    }

   
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return Inertia::render('Users/UserEdit' , ['user' => $user, 'roles' => $roles]);
    }


}
