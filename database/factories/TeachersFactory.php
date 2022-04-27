<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'rating'=>rand(1,100),
            'subject'=>$this->faker->sentence(2),
            'start_of_work'=>$this->faker->dateTimeBetween()
        ];
    }
}
