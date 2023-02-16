<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_categories')->insert([
            ['name'=>'school/work','description'=>'The task is nowhere important.'],
            ['name'=>'sports/games','description'=>'The task now is least important.'],
            ['name'=>'shopping','description'=>'The task is 50-50.'],
            ['name'=>'religions','description'=>'The task is a bit important.'],
            ['name'=>'social','description'=>'The task is important!.'],
            ['name'=>'others','description'=>'The task is very important!.'],
        ]); 
    }
}
