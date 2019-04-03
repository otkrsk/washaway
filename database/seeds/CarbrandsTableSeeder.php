<?php

use Illuminate\Database\Seeder;

class CarbrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Honda',
            'Toyota',
            'Proton',
            'Nissan'
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('carbrands')->truncate();

        for($i = 0; $i < 4; $i++)
        {
            DB::table('carbrands')->insert([
                'name' => $brands[$i]
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
