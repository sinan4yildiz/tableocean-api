<?php

namespace Database\Factories;

use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => $this->faker->company(),
            'email'        => $this->faker->companyEmail(),
            'dial_number'  => $this->faker->countryCode(),
            'phone_number' => $this->faker->phoneNumber(),
            'website'      => $this->faker->domainName(),
            'cuisine_id'   => Cuisine::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        $this->create([
            'name'         => 'Restaurant Demo',
            'email'        => 'email@restaurant-demo.co.uk',
            'dial_number'  => '+44',
            'phone_number' => '+447444647199',
            'website'      => 'www.restaurant-demo.co.uk',
            'cuisine_id'   => Cuisine::inRandomOrder()->first()->id,
        ]);

        return $this;
    }
}
