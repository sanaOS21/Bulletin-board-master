<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザ情報
        DB::table('users')->insert([
            'username' => 'test',
            'email' => 'test@mail',
            'password' => 'test1234',
        ]);
    }
}
