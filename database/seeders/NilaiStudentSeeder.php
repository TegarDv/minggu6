<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_student = [
            [ 'course_id' => 1, 'student_id' => 5, 'nilai' => 'A', ],
            [ 'course_id' => 2, 'student_id' => 5, 'nilai' => 'A', ],
            [ 'course_id' => 3, 'student_id' => 5, 'nilai' => 'B', ],
            [ 'course_id' => 4, 'student_id' => 5, 'nilai' => 'A', ],

            [ 'course_id' => 1, 'student_id' => 6, 'nilai' => 'B', ],
            [ 'course_id' => 2, 'student_id' => 6, 'nilai' => 'A', ],
            [ 'course_id' => 3, 'student_id' => 6, 'nilai' => 'A', ],
            [ 'course_id' => 4, 'student_id' => 6, 'nilai' => 'B', ],

            [ 'course_id' => 1, 'student_id' => 7, 'nilai' => 'B', ],
            [ 'course_id' => 2, 'student_id' => 7, 'nilai' => 'B', ],
            [ 'course_id' => 3, 'student_id' => 7, 'nilai' => 'B', ],
            [ 'course_id' => 4, 'student_id' => 7, 'nilai' => 'A', ],

            [ 'course_id' => 1, 'student_id' => 8, 'nilai' => 'B', ],
            [ 'course_id' => 2, 'student_id' => 8, 'nilai' => 'B', ],
            [ 'course_id' => 3, 'student_id' => 8, 'nilai' => 'B', ],
            [ 'course_id' => 4, 'student_id' => 8, 'nilai' => 'A', ],

        ];

        DB::table('course_student')->insert($course_student);
    }
}
