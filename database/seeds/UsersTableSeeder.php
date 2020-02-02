<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dragan Mitić',
                'username' => 'dmitic',
                'prioritet' => '1',
                'email' => 'dmitic@gmail.com',
                'password' => \Hash::make('123123123'),
                'is_active' => true,
            ],
            [
                'name' => 'Pera Perić',
                'username' => 'ppera',
                'prioritet' => '1',
                'email' => 'pera@gmail.com',
                'password' => \Hash::make('123123123'),
                'is_active' => true,
            ],
        ]);
    }
}
