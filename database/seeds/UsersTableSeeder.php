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
            'name'     => 'Administrador',
            'email'    => 'admin@mail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name'     => 'Fulano',
            'email'    => 'fulano@mail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
