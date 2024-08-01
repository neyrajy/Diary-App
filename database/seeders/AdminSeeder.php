<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin 
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '01716720487',
            'password' =>  Hash::make('password'),
            'is_admin' => true,
        ]);


        // user 
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'phone' => '01914002131',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
