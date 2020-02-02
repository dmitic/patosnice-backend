<?php

use Illuminate\Database\Seeder;

class VrsteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vrste')->insert([
            [
                'naziv' => 'GUMENE patosnice',
            ],
            [
                'naziv' => 'TEPIH patosnice', 
            ],
            [
                'naziv' => 'TEPIH patosnice ECONOMIC', 
            ],
            [
                'naziv' => 'Patosnice za gepek', 
            ],
            [
                'naziv' => 'TEPIH patosnice LUX', 
            ],
        ]);
    }
}
