<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            [
                'naziv' => 'Gumene',
                'nad_naslov' => 'Patosnice',
                'naziv_linka' => 'detaljnije',
                'link' => '#',
                'slika' => 'baner-01.jpg',
                'redosled' => 1,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Tepih',
                'nad_naslov' => 'Patosnice',
                'naziv_linka' => 'detaljnije',
                'link' => '#',
                'slika' => 'baner-04.jpg',
                'redosled' => 2,
                'aktivan' => true,
            ],
            [
                'naziv' => 'Petex',
                'nad_naslov' => 'Patosnice',
                'naziv_linka' => 'detaljnije',
                'link' => '#',
                'slika' => 'baner-02.jpg',
                'redosled' => 3,
                'aktivan' => true,
            ],
            [
                'naziv' => 'AUTOBELI',
                'nad_naslov' => 'Patosnice',
                'naziv_linka' => 'detaljnije',
                'link' => '#',
                'slika' => 'baner-07.jpg',
                'redosled' => 4,
                'aktivan' => true,
            ],
        ]);
    }
}
