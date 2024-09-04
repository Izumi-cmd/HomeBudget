<?php

namespace Database\Factories;

use App\Models\HomeBudget;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomebudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'category_id' => Category::all()->random()->id,
            'price' => $this->faker->numberBetween(500, 10000),
        ];
    }
}
