<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->first_name = "admin";
        $user->last_name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt("password");
        $user->gender = 0;
        $user->role = "Admin";
        $user->nationality = "LEB";
        $user->dob = "1990-01-01";
        $user->city = "Beirut";
        $user->country = "Lebanon";
        $user->bio = "This is a test bio!";
        $user->interested_in = 1;
        $user->height = 180;
        $user->weight = 80;

        $user->save();
    }
}
