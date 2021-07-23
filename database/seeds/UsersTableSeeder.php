<?php
// database/seeds/UsersTableSeeder.php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Faker\Factory::create();

	    foreach (range(1,10) as $i) {
	        User::create([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => $faker->password,
	        ]);
	    }
    }
    public function setPasswordAttribute($password)
{
    $this->attributes['password'] = bcrypt($password);
}

    
}