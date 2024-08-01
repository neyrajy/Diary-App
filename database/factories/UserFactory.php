<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            // 'firstname' => $this->faker->firstName(),
            // 'lastname' => $this->faker->lastName(),
            // 'phone' => $this->faker->phoneNumber(),
            // 'password' => Hash::make('password'),
            // 'role_id' => 8,
       ];
    }
}

