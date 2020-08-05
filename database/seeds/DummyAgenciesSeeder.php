<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyAgenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            [
                'name' => 'Michael Jackson',
                'email' => 'michael@gmail.com',
                'password' => bcrypt('michael'),
                'remember_token' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Drake',
                'email' => 'drake@gmail.com',
                'password' => bcrypt('drake'),
                'remember_token' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
