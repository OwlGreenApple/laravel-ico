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
				
				//ico
        DB::table('icos')->insert([
            'name' => 'Eximchain',
            'rating' => 4.5,
            'about' => "test about",
            'description' => "test description",
            'categories' => "test categories",
            'status' => 'test status',
            'url_link_video' => 'https://www.youtube.com/embed/3wvvfJC-qVc',
            'url_link_blog' => 'test video',
            'price' => 'test 1 eth = 5000 token',
            'platform' => 'test ethereum',
            'country_operation' => 'CA',
            'token_ticker' => 'test exm',
            'restrictions' => 'test USA China',
            'presale_start' => '2018-01-02 00:00:00',
            'presale_end' => '2018-12-01 00:00:00',
            'sale_start' => '2019-01-02 00:00:00',
            'sale_end' => '2019-12-01 00:00:00',
            'logo' => '1.jpg',
        ]);
				
        DB::table('icos')->insert([
            'name' => 'Mandala',
            'rating' => 4.7,
            'about' => "test about m",
            'description' => "test description m",
            'categories' => "test categories m",
            'status' => 'test status m',
            'url_link_video' => 'https://www.youtube.com/embed/3wvvfJC-qVc',
            'url_link_blog' => 'test video m',
            'price' => 'test 1 eth = 5000 token m',
            'platform' => 'test ethereum m',
            'country_operation' => 'CA',
            'token_ticker' => 'test exm m',
            'restrictions' => 'test USA China m',
            'presale_start' => '2018-03-05 00:00:00',
            'presale_end' => '2018-12-01 00:00:00',
            'sale_start' => '2019-03-05 00:00:00',
            'sale_end' => '2019-12-01 00:00:00',
						'logo' => '2.jpg', 
        ]);
    }
}
