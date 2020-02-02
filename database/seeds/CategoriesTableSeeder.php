<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'naziv' => 'Alfa Romeo',
                'slug' => 'alfa-romeo',
                'slika' => 'alfa-romeo.png',
                'redosled' => '1',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Audi',
                'slug' => 'audi',
                'slika' => 'audi.png',
                'redosled' => '2',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'BMW',
                'slug' => 'bmw',
                'slika' => 'bmw.png',
                'redosled' => '3',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Ford',
                'slug' => 'ford',
                'slika' => 'ford.png',
                'redosled' => '4',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Hyundai',
                'slug' => 'hyundai',
                'slika' => 'hundai.png',
                'redosled' => '5',
                'aktivan' => '1',
            ],
        ]);
    }
}
