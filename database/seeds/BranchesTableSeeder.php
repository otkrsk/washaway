<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            'Puchong',
            'Sunway Mentari',
            'Cheras'
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('branches')->truncate();

        for($i = 0; $i < count($branches); $i++)
        {
            DB::table('branches')->insert([
                'name' => $branches[$i]
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
