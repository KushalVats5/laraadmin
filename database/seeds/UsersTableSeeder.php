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
             $super_admin = new User;
            $super_admin->username = 'ZatchTech';
            $super_admin->fname = 'Zatch';
            $super_admin->lname = 'Tech';
            $super_admin->email = 'admin@zatchtech.com';
            $super_admin->password = bcrypt('Kzulbsd@zatchtech1704');
            $super_admin->user_type = 'super_admin';
            $super_admin->save();
            
            $super_admin1 = new User;
            $super_admin1->username = 'Kushal';
            $super_admin1->fname = 'Kushal';
            $super_admin->lname = 'Vats';
            $super_admin1->email = 'kvats69@gmail.com';
            $super_admin1->password = bcrypt('Kzulbsd@12vats');
            $super_admin1->user_type = 'super_admin';
            $super_admin1->save();
            
            $admin = new User;
            $admin->username = 'Manoj';
            $admin->fname = 'ZatchTech';
            $admin->lname = 'Info';
            $admin->email = 'admin@getnada.com';
            $admin->password = bcrypt('Admin@2019');
            $admin->user_type = 'admin';
            $admin->save();

            $writer = new User;
            $writer->username = 'Info';
            $writer->fname = 'ZatchTech';
            $writer->lname = 'Info';
            $writer->email = 'info@zatchtech.com';
            $writer->password = bcrypt('Kzulbsd@info1704');
            $writer->user_type = 'writer';
            $writer->save();

            $subscriber = new User;
            $subscriber->username = 'Shivam';
            $subscriber->fname = 'Shivam';
            $subscriber->lname = 'Sharma';
            $subscriber->email = 'subscriber@getnada.com';
            $subscriber->password = bcrypt('Shivam@2019');
            $subscriber->user_type = 'subscriber';
            $subscriber->save();

    }
}
