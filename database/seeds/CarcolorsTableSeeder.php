<?php

use Illuminate\Database\Seeder;

class CarcolorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'Black',
            'White',
            'Silver',
            'Blue',
            'Red'
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('carcolors')->truncate();

        for($i = 0; $i < 4; $i++)
        {
            DB::table('carcolors')->insert([
                'name' => $colors[$i]
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
