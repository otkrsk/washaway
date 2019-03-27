<?php

use Illuminate\Database\Seeder;

class MenuitemsTableSeeder extends Seeder
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
            'menu_item' => 'Sales',
            'url' => 'home',
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('menu_items')->insert([
            'menu_item' => 'Member',
            'url' => 'member',
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('menu_items')->insert([
            'menu_item' => 'Report',
            'url' => 'report',
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('menu_items')->insert([
            'menu_item' => 'Appointment',
            'url' => 'appointment',
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
