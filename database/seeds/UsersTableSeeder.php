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
        $admin->name = 'Martha';
        $admin->email = 'martubix@gmail.com ';
        $admin->password = bcrypt('Tlaxcala2020');
        $admin->save();

        $admin = new User;
        $admin->name = 'Sergio';
        $admin->email = 'sgnieva@hotmail.com';
        $admin->password = bcrypt('Puebla2020');
        $admin->save();
    }
}
