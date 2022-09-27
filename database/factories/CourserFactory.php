<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
        $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));
        return [
            'teacher_id' => rand(1,6),
            'category_id' => rand(1,6),
            'name' => $name= $this->faker->sentence,
            'image' => $faker->picsumUrl(1280,720),
            'slug' => Str::slug($name),
            'description' => $this->faker->text(1200),
        ];
    }
}
