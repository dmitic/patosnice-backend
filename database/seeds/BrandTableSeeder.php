<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'naziv' => 'Petex',
                'slug' => 'petex',
                'slika' => 'slike/brendovi/petex-logo.jpg',
                'redosled' => 1,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Pro mimato',
                'slug' => 'pro-mimato',
                'slika' => 'slike/brendovi/pro-mimato.jpg',
                'redosled' => 2,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Frogum',
                'slug' => 'frogum',
                'slika' => 'slike/brendovi/FROGUM-logo.jpg',
                'redosled' => 3,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Gledring',
                'slug' => 'gledring',
                'slika' => 'slike/brendovi/gledring-logo.jpg',
                'redosled' => 4,
                'aktivan' => true,
            ],
        ]);
    }
}
