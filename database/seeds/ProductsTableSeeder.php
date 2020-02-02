<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'model_auta' => '145',
                'sifra' => '70457',
                'vrste_id' => '2',
                'naziv' => 'Alfa Romeo 145 3V',
                'slug' => 'tepih-patosnice-alfa-romeo-145-3v',
                'proizvodjac' => 'PRO-MIMATO',
                'cena' => '2400.00',
                'na_akciji' => false,
                'redosled' => '1',
                'aktivan' => true,
            ],
            [
                'category_id' => 3,
                'model_auta' => 'X6',
                'sifra' => '70073',
                'vrste_id' => '1',
                'naziv' => 'BMW X6 E71 od 2008-2014',
                'slug' => 'gumene-patosnice-bmw-x6-od-2008-2014',
                'proizvodjac' => 'GLEDRING',
                'cena' => '4650.00',
                'na_akciji' => false,
                'redosled' => '160',
                'aktivan' => true,
            ],
            [
                'category_id' => 5,
                'model_auta' => 'i30',
                'sifra' => '67029',
                'vrste_id' => '1',
                'naziv' => 'Hyundai i30 od 3/2012',
                'slug' => 'gumene-patosnice-hyundai-i30-od-3-2012',
                'proizvodjac' => 'PETEX',
                'cena' => '4800.00',
                'na_akciji' => false,
                'redosled' => '518',
                'aktivan' => true,
            ],
        ]);
    }
}
