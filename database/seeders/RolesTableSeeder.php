<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            "role_name" => "Super Admin",
            "role_slug" => "admin",
        ]);

        DB::table("roles")->insert([
            "role_name" => "Admin",
            "role_slug" => "admin",
        ]);
 
        DB::table("roles")->insert([
            "role_name" => "Manager",
            "role_slug" => "manager",
        ]);
 
        DB::table("roles")->insert([
            "role_name" => "Parent",
            "role_slug" => "parent",
        ]);

        DB::table("roles")->insert([
            "role_name" => "Teacher",
            "role_slug" => "teacher",
        ]);

        DB::table("roles")->insert([
            "role_name" => "Driver",
            "role_slug" => "driver",
        ]);

        DB::table("roles")->insert([
            "role_name" => "Staff",
            "role_slug" => "staff",
        ]);

        DB::table("roles")->insert([
            "role_name" => "Student",
            "role_slug" => "student",
        ]);
    }
}
