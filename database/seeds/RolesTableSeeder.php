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
            $super_admin = new Role;
            $super_admin->name = 'super_admin';
            $super_admin->save();

            $admin = new Role;
            $admin->name = 'admin';
            $admin->save();
            
            $writer = new Role;
            $writer->name = 'writer';
            $writer->save();

            $subscriber = new Role;
            $subscriber->name = 'subscriber';
            $subscriber->save();
    }
}
