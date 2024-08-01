<?php

namespace Database\Factories;

use App\Helpers\KJDAHelpers;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session' => KJDAHelpers::getCurrentSession(),
            's_class_id' => SClass::first()->id,
            'section_id' => Section::first()->id,
            'user_id' => null
        ];
    }
}
