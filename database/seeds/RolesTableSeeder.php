<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = new Role;
            $user->name = 'super_admin';
            $user->save();


            $admin = new Role;
            $admin->name = 'admin';
            $admin->save();


            $superadmin = new Role;
            $superadmin->name = 'subscriber';
            $superadmin->save();

    }
}
