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
                'name' => "Henk",
                'email' => 'henk@gmail.com',
                'role_id' => 1,
                'active' => 1,
                'password' => bcrypt('Welkom#1'),
            ],

            [
                'name' => "Patrick",
                'email' => 'patrick@gmail.com',
                'role_id' => 1,
                'active' => 1,
                'password' => bcrypt('Welkom#1'),
            ],


            [
                'name' => "admin",
                'email' => 'admin@gmail.com',
                'role_id' => 2,
                'active' => 1,
                'password' => bcrypt('Welkom#1'),
            ],


            [
                'name' => "superadmin",
                'email' => 'superadmin@gmail.com',
                'role_id' => 3,
                'active' => 1,
                'password' => bcrypt('Welkom#1'),
            ],

        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
