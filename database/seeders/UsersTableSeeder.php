<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\KJDAHelpers;
use Illuminate\Support\Str;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "role_id" => "1",
            "firstname" => "Super",
            "lastname" => "Admin",
            "phone" => "0769129676",
            "password" => bcrypt("password"),
        ]);

        User::create([
            "role_id" => "1",
            "firstname" => "Super",
            "lastname" => "Admin",
            "phone" => "0710066540",
            "password" => '1234567890',
        ]);

        DB::table("users")->insert([
            "role_id" => "2",
            "firstname" => "School",
            "lastname" => "Admin",
            "phone" => "0769129670",
            "password" => bcrypt("password"),
        ]);

        DB::table("users")->insert([
            "role_id" => "3",
            "firstname" => "School",
            "lastname" => "Manager",
            "phone" => "0769129671",
            "password" => bcrypt("password"),
        ]);

        DB::table("users")->insert([
            "role_id" => "4",
            "firstname" => "Parent",
            "lastname" => "One",
            "phone" => "0769129672",
            "password" => bcrypt("password"),
        ]);

        DB::table("users")->insert([
            "role_id" => "5",
            "firstname" => "Teacher",
            "lastname" => "One",
            "phone" => "0769129673",
            "password" => bcrypt("password"),
        ]);
        

        DB::table("users")->insert([
            "role_id" => "6",
            "firstname" => "Driver",
            "lastname" => "One",
            "phone" => "0769129674",
            "password" => bcrypt("password"),
        ]);

        DB::table("users")->insert([
            "role_id" => "7",
            "firstname" => "Staff",
            "lastname" => "One",
            "phone" => "0769129675",
            "password" => bcrypt("password"),
        ]);

        DB::table("users")->insert([
            "role_id" => "8",
            "firstname" => "Grace",
            "lastname" => "Damian",
            "phone" => "0769129679",
            "password" => bcrypt("password"),
        ]);
    }
}
