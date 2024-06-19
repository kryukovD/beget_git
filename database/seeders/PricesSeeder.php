<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Prices;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `prices` VALUES (1,'Визитка',10000,'2024-01-31 14:12:24','2024-01-31 14:12:24'),(2,'Лендинг',25000,'2024-01-31 14:12:24','2024-01-31 14:12:24'),(3,'Интернет магазин',70000,'2024-01-31 14:12:24','2024-01-31 14:12:24');");
    
    }
}
