<?php

use Illuminate\Database\Seeder;

class CartypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carTypes = [
            'Sedan, Hatchback',
            'SUV, MPV, 4x4'
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('cartypes')->truncate();

        for($i = 0; $i < count($carTypes); $i++)
        {
            DB::table('cartypes')->insert([
                'type' => $carTypes[$i]
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
