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
                'slika' => 'petex-logo.jpg',
                'redosled' => 1,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Pro mimato',
                'slug' => 'pro-mimato',
                'slika' => 'pro-mimato.jpg',
                'redosled' => 2,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Frogum',
                'slug' => 'frogum',
                'slika' => 'FROGUM-logo.jpg',
                'redosled' => 3,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Gledring',
                'slug' => 'gledring',
                'slika' => 'gledring-logo.jpg',
                'redosled' => 4,
                'aktivan' => true,
            ],
        ]);
    }
}
