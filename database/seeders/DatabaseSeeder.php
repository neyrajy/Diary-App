<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(BloodGroupsTableSeeder::class);

        //$this->call(GradesTableSeeder::class);
        $this->call(SClassSeeder::class);
        $this->call(SchoolSeeder::class);
        //$this->call(SubjectsTableSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(StudentSeeder::class);
        // $this->call(SkillsTableSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([

        //     //AdminSeeder::class
            
        // ]);
    }
}
