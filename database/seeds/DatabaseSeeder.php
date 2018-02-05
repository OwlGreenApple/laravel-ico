<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'email' => 'celebgramme.dev@gmail.com',
            'password' => bcrypt('admin888'),
            'is_confirm_email' => 1,
            'fullname' => 'Rizky R',
            'gender' => 1,
            'is_admin' => 1,
        ]);
        DB::table('users')->insert([
            'email' => 'vendella.aurine@gmail.com',
            'password' => bcrypt('icocheckr888'),
            'is_confirm_email' => 1,
            'fullname' => 'Vendella',
            'gender' => 0,
            'is_admin' => 1,
        ]);
        DB::table('users')->insert([
            'email' => 'michaelsugih@gmail.com',
            'password' => bcrypt('admin888'),
            'is_confirm_email' => 1,
            'fullname' => 'Michael',
            'gender' => 1,
            'is_admin' => 1,
        ]);
    }
}
