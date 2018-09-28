<?php

use App\Models\User;
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
        	'name' 		=> 'Heytor',
        	'email' 	=> 'heytor.ti@unimedrecife.com.br',
        	'password' 	=> bcrypt('admin'),
        ]);
    }
}
