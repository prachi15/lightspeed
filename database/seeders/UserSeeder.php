<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
    		[
    			// id => '1',
	    		'name' => 'stuart',
	    		'email' => 'stuart@gmail.com',
	    		'password' => Hash::make('password'),

	    	],[
	    		// id => '2',
	    		'name' => 'tyler',
	    		'email' => 'tyler@gmail.com',
	    		'password' => Hash::make('password'),
	    	],[
	    		// id => '3',
	    		'name' => 'adam',
	    		'email' => 'adam@gmail.com',
	    		'password' => Hash::make('password'),
	    	],[
	    		// id => '4',
	    		'name' => 'lan',
	    		'email' => 'lan@gmail.com',
	    		'password' => Hash::make('password'),
	    	]
    	];

    	User::insert($users);
    }
}
