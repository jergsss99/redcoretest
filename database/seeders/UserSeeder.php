<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Role::create([
            'name' => 'Admin',
        ]);


        User::create([
            'name' => 'Admin',
            'email' => 'admin@redcore.com',
            'password' => Hash::make('Asd@123123'),
        ]);


        RoleUser::create([
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
