<?php

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
        DB::table('users')->insert([
            'name' => 'Emmanuel',
            'username' => 'emmanuelr20',
            'is_activated' => true,
            'is_admin' => true,
            'phone' => '0987678987',
            'email' => 'emmanuelr20@yahoo.com',
            'password' =>Hash::make('qwerty'),
        ]);
        DB::table('users')->insert([
            'name' => 'sammy',
            'username' => 'sammy',
            'is_activated' => true,
            'is_admin' => true,
            'phone' => '0987678987',
            'email' => 'sammy@yahoo.com',
            'password' =>Hash::make('qwerty'),
        ]);
        DB::table('users')->insert([
            'name' => 'josh',
            'username' => 'josh',
            'is_activated' => true,
            'is_admin' => false,
            'phone' => '0987678987',
            'email' => 'josh@yahoo.com',
            'password' =>Hash::make('qwerty'),
        ]);
    }
}
