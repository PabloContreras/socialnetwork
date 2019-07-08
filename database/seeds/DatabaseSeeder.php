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
        DB::table('users')->insert([
            'name' => 'Pablo Contreras',
            'username' => 'PabloContreras',
            'email' => 'pablo_contreras_1997@outlook.com',
            'password' => bcrypt('Lapatita9'),
        ]);
        DB::table('users')->insert([
            'name' => 'Pablo Contreras',
            'username' => 'PabloContreras1',
            'email' => 'pablo_contreras@outlook.com',
            'password' => bcrypt('Lapatita9'),
        ]);
        DB::table('users')->insert([
            'name' => 'Otro Pablo', 
            'username' => 'PabloContreras2',
            'email' => 'pablo@outlook.com',
            'password' => bcrypt('Lapatita9'),
        ]);
    }
}
