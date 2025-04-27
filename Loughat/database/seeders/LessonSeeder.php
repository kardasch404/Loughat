<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lesson::create([
            'section_id' => 1,
            'title' => 'Alphabet auf Deutsch',
            'type' => 'video',
            'duration' => '10:23',
            'file_path' => 'https://youtu.be/ql7J-srh6iA?si=dMLoyGEIqHoL8MT8',
            'order' => 1,
        ]);

        Lesson::create([
            'section_id' => 1,
            'title' => 'Begrüßungen und Vorstellungen',
            'type' => 'file',
            'duration' => '5:00',
            'file_path' => 'files/begruessungen.pdf',
            'order' => 2,
        ]);

        // Lessons for Section 2 (A1 Grammatik)
        Lesson::create([
            'section_id' => 2,
            'title' => 'Personalpronomen im Deutschen',
            'type' => 'video',
            'duration' => '8:45',
            'file_path' => 'https://youtu.be/ql7J-srh6iA?si=dMLoyGEIqHoL8MT8',
            'order' => 1,
        ]);

        Lesson::create([
            'section_id' => 2,
            'title' => 'Verbkonjugation im Präsens',
            'type' => 'file',
            'duration' => '6:30',
            'file_path' => 'files/verbkonjugation_praesens.pdf',
            'order' => 2,
        ]);

        // Lessons for B1 Sections
        Lesson::create([
            'section_id' => 3,
            'title' => 'Tipps zum Hörverstehen B1',
            'type' => 'video',
            'duration' => '12:10',
            'file_path' => 'https://youtu.be/ql7J-srh6iA?si=dMLoyGEIqHoL8MT8',
            'order' => 1,
        ]);

        Lesson::create([
            'section_id' => 4,
            'title' => 'Schreiben einer E-Mail (B1)',
            'type' => 'file',
            'duration' => '7:00',
            'file_path' => 'files/schreiben_email_b1.pdf',
            'order' => 1,
        ]);

    }
}
