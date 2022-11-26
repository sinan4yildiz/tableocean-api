<?php

namespace Database\Seeders\Seeds;

use App\Enum\PlanTypesEnum;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    static string $table = 'plans';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = collect([
            [
                'price'        => 0,
                'type'         => PlanTypesEnum::BOOKING,
                'translations' => [
                    [
                        'language' => 'en',
                        'title'    => 'Free'
                    ]
                ]
            ],
            [
                'price'        => 29,
                'type'         => PlanTypesEnum::BOOKING,
                'translations' => [
                    [
                        'language' => 'en',
                        'title'    => 'Small'
                    ]
                ]
            ],
            [
                'price'        => 79,
                'type'         => PlanTypesEnum::BOOKING,
                'translations' => [
                    [
                        'language' => 'en',
                        'title'    => 'Medium'
                    ]
                ]
            ],
            [
                'price'        => 129,
                'type'         => PlanTypesEnum::BOOKING,
                'translations' => [
                    [
                        'language' => 'en',
                        'title'    => 'Large'
                    ]
                ]
            ],
        ]);


        /*
         * Create
         * */
        foreach ($data as $item) {
            $created = Plan::create(collect($item)->except(['translations'])->toArray());

            foreach ($item['translations'] as $translation) {
                $created->translations()->create($translation);
            }
        }

    }
}
