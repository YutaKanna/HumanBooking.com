<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyPlannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planners')->insert([
            [
                'name' => 'planner1',
                'email' => 'planner1@gmail.com',
                'password' => bcrypt('planner'),
                'remember_token' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'planner2',
                'email' => 'planner2@gmail.com',
                'password' => bcrypt('planner'),
                'remember_token' => str_random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
