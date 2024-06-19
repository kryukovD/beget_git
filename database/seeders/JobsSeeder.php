<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::upsert(
            [
                ["name" => "AO \"MOI ZAKAZY\"", "position" => "Bitrix программист", "period_text" => "1 год", "period_mounth" => 12],
                ["name" => "Digital-агентство \"Экспансия\"", "position" => "Frontend разработчик", "period_text" => "1 год", "period_mounth" => 12],
                ["name" => "Digital-агентство \"HI-TECH MEDIA\"", "position" => "Fullstack разработчик", "period_text" => "7 месяцев - По текуший момент", "period_mounth" => 7],
                
                
            ],
            ['name'],
            ['name', 'position', 'period_text', 'period_mounth']
        );
    }
}
