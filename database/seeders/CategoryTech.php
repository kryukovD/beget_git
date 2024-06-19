<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryTechnologies;


class CategoryTech extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryTechnologies::upsert([
            ["name"=>"Php фреймворки"],
            ["name"=>"Js фреймворки"],
            ["name"=>"Cms"]],
            ['name'],["name"]);
    }
    
}
