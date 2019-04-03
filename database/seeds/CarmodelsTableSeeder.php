<?php

use Illuminate\Database\Seeder;

class CarmodelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            1 => [
                [
                    'name' => 'Jazz',
                    'type' => 1,
                ],
                [
                    'name' => 'Civic',
                    'type' => 1,
                ],
                [
                    'name' => 'Accord',
                    'type' => 1,
                ],
                [
                    'name' => 'City',
                    'type' => 1,
                ]
            ],
            2 => [
                [
                    'name' => 'Yaris',
                    'type' => 1,
                ],
                [
                    'name' => 'Prius',
                    'type' => 1,
                ],
                [
                    'name' => '86',
                    'type' => 1,
                ],
                [
                    'name' => 'Camry',
                    'type' => 1,
                ]
            ],
            3 => [
                [
                    'name' => 'Saga',
                    'type' => 1,
                ],
                [
                    'name' => 'Persona',
                    'type' => 1,
                ],
                [
                    'name' => 'Iriz',
                    'type' => 1,
                ],
                [
                    'name' => 'Perdana',
                    'type' => 1,
                ]
            ],
            4 => [
                [
                    'name' => 'Altima',
                    'type' => 1,
                ],
                [
                    'name' => 'Frontier',
                    'type' => 2,
                ],
                [
                    'name' => 'GT-R',
                    'type' => 1,
                ],
                [
                    'name' => 'X-Trail',
                    'type' => 2,
                ]
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('carmodels')->truncate();

        for($i = 1; $i <= count($models); $i++)
        {
            for($x = 0; $x < count($models[$i]); $x++)
            {
                DB::table('carmodels')->insert([
                    'name' => $models[$i][$x]['name'],
                    'type' => $models[$i][$x]['type'],
                    'carbrand_id' => $i
                ]);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
