<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Section::create([
            'course_id' => 22,
            'title' => 'Grundlagen der deutschen Sprache',
            'order' => 1,
        ]);

        Section::create([
            'course_id' => 22,
            'title' => 'Deutsche Grammatik A1',
            'order' => 2,
        ]);

        Section::create([
            'course_id' => 23,
            'title' => 'Prüfungsvorbereitung B1: Hörverstehen',
            'order' => 1,
        ]);

        Section::create([
            'course_id' => 23,
            'title' => 'Prüfungsvorbereitung B1: Schreiben',
            'order' => 2,
        ]);
    }
}
