<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id'     => Restaurant::inRandomOrder()->first()->id,
            'plan_id'           => Plan::inRandomOrder()->first()->id,
            'firstname'         => $this->faker->firstName(),
            'lastname'          => $this->faker->lastName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('46ad13da'),
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
            'restaurant_id'     => 1,
            'plan_id'           => 1,
            'firstname'         => 'Client',
            'lastname'          => 'Demo',
            'email'             => 'client@tableocean.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('46ad13da'),
        ]);

        return $this;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
