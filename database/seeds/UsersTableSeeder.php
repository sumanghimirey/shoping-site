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
            'username' => 'root',
            'email' => 'root@email.com',
            'password' => bcrypt('password123'),
            'name' => 'Broadway Admin',
            'status' => true,
        ]);
    }
}
