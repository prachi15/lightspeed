<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\WebsiteUpdates;

class WebsiteUpdateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$updates = [
    		[
    			// id => '1',
	    		'user_id' => 1, /*stuart*/
	    		'project_id' => 1, /*Add to Socket IO*/
	    		'name' => 'Websocket Updates',

	    	],[
	    		// id => '2',
	    		'user_id' => 1, /*stuart*/
	    		'project_id' => 2, /*Enable Broadcasting*/
	    		'name' => 'Websocket Updates',
	    	],[
	    		// id => '3',
	    		'user_id' => 1, /*stuart*/
	    		'project_id' => 3, /*Adjust Interface*/
	    		'name' => 'Websocket Updates',
	    	],[
	    		// id => '4',
	    		'user_id' => 1, /*stuart*/
	    		'project_id' => 4, /*Fix Broken Things*/
	    		'name' => 'Angular Upgrade',
	    	],[
	    		// id => '5',
	    		'user_id' => 2, /*tyler*/
	    		'project_id' => 5, /*Shopping Cart*/
	    		'name' => 'E-Commerce Website',
	    	],[
	    		// id => '6',
	    		'user_id' => 3, /*adam*/
	    		'project_id' => 6, /*Product Pages*/
	    		'name' => 'E-Commerce Website',
	    	],[
	    		// id => '7',
	    		'user_id' => 3, /*adam*/
	    		'project_id' => 7, /*My Account*/
	    		'name' => 'E-Commerce Website',
	    	],[
	    		// id => '8',
	    		'user_id' => 4, /*lan*/
	    		'project_id' => 8, /*Upgrade Angular*/
	    		'name' => 'Angular Upgrade',
	    	],[
	    		// id => '9',
	    		'user_id' => 4, /*lan*/
	    		'project_id' => 9, /*Test*/
	    		'name' => 'Angular Upgrade',
	    	]
    	];

    	WebsiteUpdates::insert($updates);
    }
}
