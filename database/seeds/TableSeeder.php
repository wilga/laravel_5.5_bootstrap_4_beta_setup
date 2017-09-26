<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('en_US');

        // Super User account
        User::create([
            'name'       => 'Super User',
            'email'      => 'info@example.com',
            'password'   => bcrypt('az1by2'),
        ]);
    }

}