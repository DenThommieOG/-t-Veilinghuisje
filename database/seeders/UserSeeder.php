<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create([
            'name' => 'is_admin',
            'slug' => 'admin'
        ]);
        $user = User::create([
            'name' => 'beheerder',
            'email' => 'beheerder@example.com',
            'password' => bcrypt('password')
        ]);
        $user->roles()->attach($admin);
    }
}
