<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname'  => $this->faker->lastName(),
            'email'     => $this->faker->unique()->safeEmail(),
            'password'  => Hash::make('46ad13da'),
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
            'firstname' => 'Admin',
            'lastname'  => 'Demo',
            'email'     => 'admin@tableocean.com',
            'password'  => Hash::make('46ad13da'),
        ]);

        return $this;
    }
}
