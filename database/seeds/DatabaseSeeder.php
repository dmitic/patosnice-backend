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
        // $this->call(UsersTableSeeder::class);
        $this->call(VrsteTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(PostTypeTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
