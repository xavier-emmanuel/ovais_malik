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
            'name' => 'Ovais Malik',
            'username' => 'ovais_malik',
            'password' => bcrypt('ovais_malik'),
        ]);
    }
}
