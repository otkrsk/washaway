<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();

        DB::table('permissions')->insert([
            'name' => 'manage_site',
            'label' => 'Site Manager'
        ]);

        DB::table('permission_role')->truncate();

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
