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
                'slika' => 'slike/proizvodjaci/alfa-romeo.png',
                'redosled' => '1',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Audi',
                'slug' => 'audi',
                'slika' => 'slike/proizvodjaci/audi.png',
                'redosled' => '2',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'BMW',
                'slug' => 'bmw',
                'slika' => 'slike/proizvodjaci/bmw.png',
                'redosled' => '3',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Ford',
                'slug' => 'ford',
                'slika' => 'slike/proizvodjaci/ford.png',
                'redosled' => '4',
                'aktivan' => '1',
            ],
            [
                'naziv' => 'Hyundai',
                'slug' => 'hyundai',
                'slika' => 'slike/proizvodjaci/hundai.png',
                'redosled' => '5',
                'aktivan' => '1',
            ],
        ]);
    }
}
