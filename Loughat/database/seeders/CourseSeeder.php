<?php

namespace Database\Seeders;

use App\Models\Cours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cours::create([
            'title' => 'Deutsch A1 für Anfänger',
            'description' => 'Ein kompletter A1 Deutschkurs für Anfänger mit Grammatik und Wortschatz.',
            'photo' => 'https://sla-basel.ch/wp-content/uploads/2020/06/SLA_Deutsch-lernen-2.png',
            'price' => 49.99,
            'level' => 'basic',
            'categorie_id' => 1,
            'teacher_id' => 14,
        ]);

        Cours::create([
            'title' => 'Deutsch B1 Prüfungsvorbereitung',
            'description' => 'Vorbereitung auf die B1 Deutschprüfung mit Tipps und Beispielen.',
            'photo' => 'https://sla-basel.ch/wp-content/uploads/2020/06/SLA_Deutsch-lernen-3.png',
            'price' => 59.99,
            'level' => 'intermediar',
            'categorie_id' => 1,
            'teacher_id' => 14,
        ]);
    }
}
