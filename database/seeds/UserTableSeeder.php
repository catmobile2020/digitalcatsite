<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>'mahmoudnada5050@gmail.com',
            'country'=>'Cairo',
            'phone'=>'01208971865',
            'address'=>'nasr city,cairo',
            'role_id'=>1,
            'pharmacy_id'=>1,
            'status'=>1,
            'password'=>bcrypt(123456),
        ]);
    }
}
