<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     //
    //     DB::table('users')->insert([
    //         'name' => 'superadmin',
    //         'email' => 'superadmin@getnada.com',
    //         'password' => bcrypt('superadmin@2019'),
    //         'role' => 'super_admin',
    //     ]);
    //     DB::table('users')->insert([
    //         'name' => 'admin',
    //         'email' => 'admin@getnada.com',
    //         'password' => bcrypt('admin@2019'),
    //         'role' => 'admin',
    //     ]);
    //     DB::table('users')->insert([
    //         'name' => 'subscriber',
    //         'email' => 'subscriber@getnada.com',
    //         'password' => bcrypt('subscriber@2019'),
    //         'role' => 'subscriber',
    //     ]);
    // }


    public function run()
    {
            $user = new User;
            $user->name = 'Kushal';
            $user->email = 'superadmin@getnada.com';
            $user->password = bcrypt('superadmin@2019');
            $user->user_type = 'super_admin';
            $user->save();


            $admin = new User;
            $admin->name = 'Manoj';
            $admin->email = 'admin@getnada.com';
            $admin->password = bcrypt('admin@2019');
            $admin->user_type = 'admin';
            $admin->save();


            $superadmin = new User;
            $superadmin->name = 'Shivam';
            $superadmin->email = 'subscriber@getnada.com';
            $superadmin->password = bcrypt('subscriber@2019');
            $superadmin->user_type = 'subscriber';
            $superadmin->save();

    }
}
