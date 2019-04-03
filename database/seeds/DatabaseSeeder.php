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
        $this->call(CustomercarsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
