<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
               'name'=>'Admin',
               'role' => 'admin',
               'email'=>'admin@test.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'role' => 'user',
               'email'=>'user@test.com',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }

    }
}
