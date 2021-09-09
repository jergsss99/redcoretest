<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
   
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'min:3']
        ])->validate();



        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return redirect()->back();
    }

    public function show(Role $rolesApi)
    {
        return (new RoleResource($rolesApi))->response();
    }

    
    public function update(Request $request)
    {
        Validator::make($request->only('name','slug','description'), [
            'name' => ['required', 'min:3']
        ])->validate();


        if ($request->has('id')) {
            Role::find($request->input('id'))->update($request->all());
        }
    }

    
    public function destroy($id)
    {
        Role::find($id)->delete();
    }
}
