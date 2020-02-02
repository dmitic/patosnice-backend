<?php

use Illuminate\Database\Seeder;

class PostTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert([
            [
                'tip' => 'Blog',
            ],
            [
                'tip' => 'Tekst', 
            ],
        ]);
    }
}
