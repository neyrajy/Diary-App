<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Section;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createStudentRecord();
        //$this->createManyStudentRecords(3);
    }

    protected function createManyStudentRecords(int $count)
    {
        $sections = Section::all();

        foreach ($sections as $section){
          User::factory()
                ->has(
                    Student::factory()
                    ->state([
                    'section_id' => $section->id,
                    's_class_id' => $section->s_class_id,
                    'role_id' => function(User $user){
                        return ['role_id' => $user->id];
                    },
                ]), 'student_record')
                ->count($count)
                ->create([
                    'role_id' => 8,
                ]);
        }

    }

    protected function createStudentRecord()
    {
        $section = Section::first();

        $user = User::factory()->create([
            'firstname' => 'Grace',
            'lastname' => 'Damian',
            'password' => 'password',
            'phone' => '0710100100',
            'role_id' => 8,

        ]);

        Student::factory()->create([
            's_class_id' => $section->s_class_id,
            'user_id' => $user->id,
            'section_id' => $section->id
        ]);
    }
}

