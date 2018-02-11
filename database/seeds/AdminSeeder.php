<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
        	"username" => "ADM0001",
        	"password" => bcrypt("admin"),
        	"birthdate" => "1990-11-18",
        	"role" => "Admin",
        	"name" => "Andrew"
        ]);
    }
}
