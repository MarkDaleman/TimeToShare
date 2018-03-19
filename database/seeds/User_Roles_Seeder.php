<?php

use Illuminate\Database\Seeder;

class User_Roles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
            ['name' => "gebruiker"],
            ['name' => "admin"],
            ['name' => "superadmin"]
                ]
        );
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
