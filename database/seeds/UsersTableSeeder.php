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
        App\User::create([
            'prenom' => 'Ricardo',
            'nom'    => 'Correia',
            'adresse' => 'Dakar',
            'telephone' => '77 671 15 82',
            'avatar'    => 'admin/users/default.png',
            'admin'     => 1,
            'email'     => 'ricascorreia00@gmail.com',
            'password'  => bcrypt('12345678')
        ]);
    }
}
