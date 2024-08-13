<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\KJDAHelpers;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'session' => '2023/2024',
            's_class_id' => SClass::first()->id,
            'section_id' => Section::first()->id,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
        ];
    }
}

