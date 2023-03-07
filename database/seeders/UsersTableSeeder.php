<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'gender' => 'm',
            'address' => 'Jaffna',
            'mobile' => 789789798,
            'role' => 'admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

       /* User::create([      
            'name' => 'emp',
            'email' => 'emp@gmail.com',
            'gender' => 'm',
            'address' => 'Jaffna',
            'mobile' => 789789798,
            'role' => 'employee',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]); */
    }
}
