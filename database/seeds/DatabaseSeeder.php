<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchesTableSeeder::class);
        $this->call(CarbrandsTableSeeder::class);
        $this->call(CarcolorsTableSeeder::class);
        $this->call(CarmodelsTableSeeder::class);
        $this->call(CartypesTableSeeder::class);
        $this->call(MenuitemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
