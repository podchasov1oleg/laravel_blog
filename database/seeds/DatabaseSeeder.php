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
         $this->call([
             PostsTableSeeder::class,
             TagsTableSeeder::class,
             UserSeeder::class,
             PortfolioSeeder::class,
             PortfolioImageSeeder::class
         ]);
    }
}
