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
            
            $user = new UserRole;
            $user->user_id = 2;
            $user->role_id = 1;
            $user->save();
            
            $user = new UserRole;
            $user->user_id = 3;
            $user->role_id = 2;
            $user->save();


            $admin = new UserRole;
            $admin->user_id = 4;
            $admin->role_id = 3;
            $admin->save();


            $superadmin = new UserRole;
            $superadmin->user_id = 5;
            $superadmin->role_id = 4;
            $superadmin->save();

    }
}
