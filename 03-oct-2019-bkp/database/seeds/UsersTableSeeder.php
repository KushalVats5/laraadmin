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
        //
        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'superadmin@getnada.com',
            'password' => bcrypt('superadmin@2019'),
            'role' => 'super_admin',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@getnada.com',
            'password' => bcrypt('admin@2019'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'subscriber',
            'email' => 'subscriber@getnada.com',
            'password' => bcrypt('subscriber@2019'),
            'role' => 'subscriber',
        ]);
    }
}
