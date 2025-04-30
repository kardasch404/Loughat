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
                'title' => 'Español A1 para Principiantes',
                'description' => 'Curso introductorio para aprender español desde cero.',
                'photo' => 'https://d8285fmxt3duy.cloudfront.net/teleusers/vid_presentacion_cursos/courseImage_ESPANOL_1495097309_.png',
                'price' => 39.99,
                'level' => 'A1',
            ],
            [
                'title' => 'Español A2: Primeros Pasos',
                'description' => 'Curso de nivel A2 para avanzar con frases cotidianas.',
                'photo' => 'https://turbolangs.com/wp-content/uploads/2019/11/Espanol-DELE-A2.jpg',
                'price' => 44.99,
                'level' => 'A2',
            ],
            [
                'title' => 'Español B1: Nivel Intermedio',
                'description' => 'Curso intermedio para mejorar tu comunicación en español.',
                'photo' => 'https://img.freepik.com/premium-psd/b1-spanish-level-concept-b1-intermediate-3d-rendering-isolated-transparent-background_823159-21083.jpg?w=1380',
                'price' => 54.99,
                'level' => 'B1',
            ],
            [
                'title' => 'Español B2: Comunicación Avanzada',
                'description' => 'Aprende a debatir y expresar opiniones complejas en español.',
                'photo' => 'https://eduenligne.com/wp-content/uploads/2018/04/Languages-18.jpg',
                'price' => 64.99,
                'level' => 'B2',
            ],
            [
                'title' => 'Español C1: Profesional y Académico',
                'description' => 'Domina el español formal para contextos académicos y laborales.',
                'photo' => 'https://www.linguaspanish.es/_media/img/medium/spanish-lanuage-immersion-in-spain-programs.jpg',
                'price' => 69.99,
                'level' => 'C1',
            ],
            [
                'title' => 'Español C2: Dominio Completo',
                'description' => 'Alcanza un nivel nativo con este curso intensivo C2.',
                'photo' => 'c2_dominio.jpg',
                'price' => 74.99,
                'level' => 'C2',
            ],
        ];

        foreach ($courses as &$course) {
            $course['categorie_id'] = 17;
            $course['teacher_id'] = 33;
            $course['created_at'] = $now;
            $course['updated_at'] = $now;
        }

        DB::table('cours')->insert($courses);
    }
    }

