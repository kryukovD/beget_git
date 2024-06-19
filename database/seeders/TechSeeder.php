<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology::upsert([
            ["name"=>"Vue","srcImage"=>"/images/tech/vue.png","category"=>"Js фреймворки"],
            ["name"=>"Angular","srcImage"=>"/images/tech/angular.png","category"=>"Js фреймворки"],
            ["name"=>"1C Битрикс","srcImage"=>"/images/tech/bitrix.webp","category"=>"Cms"],
            ["name"=>"Wordpress","srcImage"=>"/images/tech/wp.webp","category"=>"Cms"],
            ["name"=>"Laravel","srcImage"=>"/images/tech/laravel.webp","category"=>"Php фреймворки"]
            ],
            ['name'],
            ["name","srcImage"]);
    }
}
