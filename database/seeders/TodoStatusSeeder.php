<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_statuses')->insert([
            ['name'=>'pending','description'=>'The task is still pending.'],
            ['name'=>'ongoing','description'=>'The task now is ongoing.'],
            ['name'=>'done','description'=>'The task is already done!'],
            ['name'=>'cancel','description'=>'The task is being cancel!'],
            ['name'=>'delay','description'=>'The task is being delay.'],
            ['name'=>'undone','description'=>'The task is not done.'],
        ]); 
    }
}
