<?php

use App\PortfolioImage;
use Illuminate\Database\Seeder;

class PortfolioImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PortfolioImage::class, 30)->create();
    }
}
