<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$projects = [
    		[
                // id => '1',
	    		'user_id' => 1,
	    		'task' => 'Add to Socket IO',
                'hours' => 2,

	    	],[
                // id => '2',
	    		'user_id' => 1,
                'task' => 'Enable Broadcasting',
                'hours' => 5,
	    	],[
                // id => '3',
	    		'user_id' => 1,
                'task' => 'Adjust Interface',
                'hours' => 3,
	    	],[
                // id => '4',
                'user_id' => 1,
                'task' => 'Fix Broken Things',
                'hours' => 10,
            ],[
                // id => '5',
                'user_id' => 2,
                'task' => 'Shopping Cart',
                'hours' => 10,
            ],[
                // id => '6',
                'user_id' => 3,
                'task' => 'Product Pages',
                'hours' => 5,
            ],[
                // id => '7',
                'user_id' => 3,
                'task' => 'My Account',
                'hours' => 5,
            ],[
                // id => '8',
                'user_id' => 4,
                'task' => 'Upgrade Angular',
                'hours' => 15,
            ],[
                // id => '9',
                'user_id' => 4,
                'task' => 'Test',
                'hours' => 10,
            ]

    	];
    	
    	Project::insert($projects);
    }
}
