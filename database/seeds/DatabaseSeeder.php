<?php

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
<<<<<<< HEAD
        // $this->call(UserSeeder::class);
=======
         $this->call(UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
>>>>>>> 78134d595fe4aa8c57c6b996d9f2cdf52e2bd44d
    }
}
