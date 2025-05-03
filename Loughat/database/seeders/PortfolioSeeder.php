<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // public function run(): void
    {
        $teacherPortfolios = [
            ['teacher_id' => 14], // deutsch
            ['teacher_id' => 33], // spanisch
            ['teacher_id' => 34], // englisch
            ['teacher_id' => 30], // englisch
            ['teacher_id' => 35], // japanisch
            ['teacher_id' => 36], // französisch
        ];

        foreach ($teacherPortfolios as $data) {
            Portfolio::create([
                'teacher_id' => $data['teacher_id'],
            ]);
        }
    }
    }
}
