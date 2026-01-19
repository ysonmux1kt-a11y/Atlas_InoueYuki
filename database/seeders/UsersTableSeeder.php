<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use を追加(DBに直接INSERTする)
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //run() を完成させる
        DB::table('users')->insert([
            'username'=>'初期ユーザー',
            'email'=>'test@example.com',
            'password'=>Hash::make('password123'),
            'bio'=>'初期ユーザーです',
            'icon_image'=>'icon1.png',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
