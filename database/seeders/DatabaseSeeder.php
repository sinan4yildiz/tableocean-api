<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Guest;
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
        Admin::factory(1)->create();
        Client::factory(10)->create();
        Guest::factory(10)->create();
    }
}
