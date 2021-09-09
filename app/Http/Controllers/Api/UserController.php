<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class UserController extends Controller
{


    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'name' => ['required', 'max:255', 'unique:users'],
            'email' => ['required','unique:users','email'],
            'password' => ['required', 'min:8', 'confirmed']
        ])->validate();


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->sync($request->role_ids);
        return redirect('/users');
    }

   
    public function show(User $usersApi)
    {
        return (new UserResource($usersApi))->response();
    }

    
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['required','email'],
            //'password' => ['confirmed', 'required', 'min:8']
        ])->validate();


        $user = User::find($id);

        $user->save($request->all());
        $user->roles()->sync($request->role_ids);
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
        
    }
}
