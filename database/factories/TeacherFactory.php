<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName(),
            'lastname'=>$this->faker->lastName(),
            'profession'=>$this->faker->jobTitle(),
            'email'=>$this->faker->email(),
            'tel'=>$this->faker->phoneNumber(),
        ];
    }
}
