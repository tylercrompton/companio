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
        App\User::insert([
            'name' => 'Administrator',
            'role' => 'admin',
            'email' => 'admin@site.com',
            'password' => Hash::make('password'),
        ]);
        App\User::insert([
            'name' => 'Manager',
            'role' => 'manager',
            'email' => 'manager@site.com',
            'password' => Hash::make('password'),
        ]);
    }
}
