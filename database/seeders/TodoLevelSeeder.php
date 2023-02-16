<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_levels')->insert([
            ['name'=>'none','description'=>'The task is nowhere important.'],
            ['name'=>'low','description'=>'The task now is least important.'],
            ['name'=>'normal','description'=>'The task is 50-50.'],
            ['name'=>'high','description'=>'The task is a bit important.'],
            ['name'=>'very high','description'=>'The task is important!.'],
            ['name'=>'critical','description'=>'The task is very important!.'],
        ]); 
    }
}
