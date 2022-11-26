<?php

namespace Database\Factories;

use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CuisineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Cuisine $cuisine) {
            $cuisine->translations()->create([
                'title'    => "{$this->faker->country()} Cuisine",
                'language' => app()->getLocale(),
            ]);
        });
    }
}
