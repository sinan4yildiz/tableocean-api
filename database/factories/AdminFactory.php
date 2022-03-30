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
            'firstname' => 'Sinan',
            'lastname'  => 'Yildiz',
            'email'     => 'snn@sinanyildiz.me',
            'password'  => Hash::make('46ad13da'),
        ];
    }
}
