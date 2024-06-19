<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Database\Seeders\UserSeeder;
use \Database\Seeders\PricesSeeder;
use \Database\Seeders\PortfoliosSeeder;
use \Database\Seeders\CategoryTech;
use \Database\Seeders\TechSeeder;
use \Database\Seeders\JobsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PricesSeeder::class);
        $this->call(PortfoliosSeeder::class);
        $this->call(CategoryTech::class);
        $this->call(TechSeeder::class);
        $this->call(JobsSeeder::class);
    }
}
