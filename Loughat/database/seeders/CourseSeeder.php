<?php

namespace Database\Seeders;

use App\Models\Cours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now();
        $courses = [
            [
                'title' => 'Fransh A1',
                'description' => 'Curso introductorio para aprender español desde cero.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 39.99,
                'level' => 'A1',
            ],
            [
                'title' => 'Fransh A2',
                'description' => 'Curso de nivel A2 para avanzar con frases cotidianas.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 44.99,
                'level' => 'A2',
            ],
            [
                'title' => 'Fransh B1',
                'description' => 'Curso intermedio para mejorar tu comunicación en español.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 54.99,
                'level' => 'B1',
            ],
            [
                'title' => 'Fransh B2',
                'description' => 'Aprende a debatir y expresar opiniones complejas en español.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 64.99,
                'level' => 'B2',
            ],
            [
                'title' => 'Fransh C1',
                'description' => 'Domina el español formal para contextos académicos y laborales.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 69.99,
                'level' => 'C1',
            ],
            [
                'title' => 'Fransh C2',
                'description' => 'Alcanza un nivel nativo con este curso intensivo C2.',
                'photo' => 'https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',
                'price' => 74.99,
                'level' => 'C2',
            ],
        ];

        foreach ($courses as &$course) {
            $course['categorie_id'] = 16;
            $course['teacher_id'] = 36;
            $course['created_at'] = $now;
            $course['updated_at'] = $now;
        }

        DB::table('cours')->insert($courses);
    }
    }

