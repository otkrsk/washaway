<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('customers')->truncate();

        DB::table('customers')->insert([
            'name' => 'Jon Snow',
            'contact_no' => '0123456789',
            'plate_no' => 'WUA2815',
            'branch_id' => 1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
