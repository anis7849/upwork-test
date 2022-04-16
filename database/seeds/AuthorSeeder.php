<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Anis kureshi',
            'email' => 'anis@yopmail.com',
        ]);

        DB::table('authors')->insert([
            'name' => 'Javed kureshi',
            'email' => 'javed@yopmail.com',
        ]);

        DB::table('authors')->insert([
            'name' => 'Mohammed kureshi',
            'email' => 'mohammed@yopmail.com',
        ]);
    }
}
