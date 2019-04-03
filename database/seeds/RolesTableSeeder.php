<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'manage_site',
                'label' => 'Site Admin'
            ],
            [
                'name' => 'site_staff',
                'label' => 'Site Staff'
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        for($i = 0; $i < count($roles); $i++)
        {
            DB::table('roles')->insert([
                'name' => $roles[$i]['name'],
                'label' => $roles[$i]['label']
            ]);
        }

        DB::table('role_user')->truncate();

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
