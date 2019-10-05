<?php

use Illuminate\Database\Seeder;
use App\UserRole;
class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = new UserRole;
            $user->user_id = 1;
            $user->role_id = 1;
            $user->save();


            $admin = new UserRole;
            $admin->user_id = 2;
            $admin->role_id = 2;
            $admin->save();


            $superadmin = new UserRole;
            $superadmin->user_id = 3;
            $superadmin->role_id = 3;
            $superadmin->save();

    }
}
