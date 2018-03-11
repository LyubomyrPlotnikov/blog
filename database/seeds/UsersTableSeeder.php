<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! User::where('email', config('admin.email'))->exists()) {
            $user = User::create([
                'name' => config('admin.name'),
                'email' => config('admin.email'),
                'password' => Hash::make(config('admin.password')),
            ]);

            $admin_role = Role::where('name', Role::ROLE_ADMIN)->first();


            $user->roles()->attach($admin_role->id);
        }
    }
}
