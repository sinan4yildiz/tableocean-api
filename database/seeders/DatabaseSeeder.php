<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Cuisine;
use App\Models\Guest;
use App\Models\Restaurant;
use Database\Seeders\Seeds\PlanSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Seeders
         * */
        $this->call([
            PlanSeeder::class,
        ]);

        /*
         * Factories
         * */
        Cuisine::factory(100)->create();
        Restaurant::factory(10)->create();
        Admin::factory(3)->create();
        Client::factory(10)->create();
        Guest::factory(10)->create();
    }
}
