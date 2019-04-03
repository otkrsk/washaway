<?php

use Illuminate\Database\Seeder;

class CustomercarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('customercars')->truncate();

        DB::table('customercars')->insert([
            'customer_id' => 1,
            'plate_no' => 'WUA2815',
            'brand' => 1,
            'model' => 1,
            'color' => 1,
            'type' => 1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
