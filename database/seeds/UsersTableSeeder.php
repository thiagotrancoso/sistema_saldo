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
        User::create([
            'name'     => 'Thiago Trancoso',
            'email'    => 'thiagostrn@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
