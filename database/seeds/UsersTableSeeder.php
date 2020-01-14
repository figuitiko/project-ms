<?php

use App\User;
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
        User::truncate();
        $admin = new User;
        $admin->name = 'frank';
        $admin->email = 'frankfigao@gmail.com';
        $admin->password = bcrypt('zaq123');
        $admin->save();
    }
}
