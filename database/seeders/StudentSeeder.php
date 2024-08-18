<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Section;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $this->createStudentRecord();
    }

    protected function createStudentRecord()
    {
        $section = Section::first();

        Student::factory()->create([
            'firstname' => 'Grace',
            'lastname' => 'Damian',
            's_class_id' => $section->s_class_id,
            'section_id' => $section->id,
            'adm_no' => '21101133370014',
        ]);
    }
}


