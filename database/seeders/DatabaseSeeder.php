<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'FullName' => 'Mathias Pora',
            'email' => 'orcusa@gmail.com',
            'password' => bcrypt('password'),
            'userType' => 'admin'
        ]);

        DB::table('f_a_q_s')->insert([
            'title' => '1',
            'text' => '2'
        ]);
        DB::table('f_a_q_s')->insert([
            'title' => '1',
            'text' => '2'
        ]);
        DB::table('f_a_q_s')->insert([
            'title' => '1',
            'text' => '2'
        ]);
        DB::table('f_a_q_s')->insert([
            'title' => '1',
            'text' => '2'
        ]);
        DB::table('f_a_q_s')->insert([
            'title' => '1',
            'text' => '2'
        ]);
    }
}
