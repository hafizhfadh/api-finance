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
            'name' => 'Ashraf Kamarudin',
            'email' => 'xxx@gmail.com',
            'password' => password_hash("123456", PASSWORD_BCRYPT, ["cost" => 8])
        ]);
    }
}
