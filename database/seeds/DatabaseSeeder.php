<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitCategoriesSeeder::class);
        $this->call(DummyAgenciesSeeder::class);
        $this->call(DummyPlannersSeeder::class);
    }
}
