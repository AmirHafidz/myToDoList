<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Admin','email'=>'admin@mirha.com','password'=>Hash::make('admin'),'isAdmin'=>1],
            ['name'=>'Messi','email'=>'Messi@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0],
            ['name'=>'Neymar','email'=>'Neymar@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0],
            ['name'=>'Mbappe','email'=>'Mbappe@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0],
            ['name'=>'Pedri','email'=>'Pedri@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0],
            ['name'=>'Haaland','email'=>'Haaland@mirha.com','password'=>Hash::make('password'),'isAdmin'=>0],
        ]);
    }
}
