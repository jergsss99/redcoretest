<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $data = Role::all();
        return Inertia::render('Roles/Index', ['data' => $data]);
    }


    public function create()
    {
        return Inertia::render('Roles/RoleCreate');
    }



    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return Inertia::render('Roles/RoleEdit')->with('data',$role);
    }





}
