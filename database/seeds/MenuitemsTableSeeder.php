<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('menu_items')->truncate();

        DB::table('menu_items')->insert([
            'menu_id' => 1,
            'name' => 'Super Car Wash'
        ]);

        DB::table('prices')->truncate();

        DB::table('prices')->insert([
            'menu_item_id' => 1,
            'car_type' => 1,
            'normal_price' => 8,
            'member_price' => 6
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
