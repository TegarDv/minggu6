<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert
        ([
            'nim' => '2031710134',
            'name' => 'Tegar Dwi Vantoro',
            'class' => 'MI-2E',
            'department' => 'Jurusan Teknologi Informasi',
            'phone_number' => '085156850932',
        ]);
        DB::table('students')->insert
        ([
            'nim' => '2031710154',
            'name' => 'Wendha Aldafa Putra Heranusa',
            'class' => 'MI-2E',
            'department' => 'Jurusan Teknologi Informasi',
            'phone_number' => '081216121053',
        ]);
        DB::table('students')->insert
        ([
            'nim' => '2031710064',
            'name' => 'Alfina Nur Azizah',
            'class' => 'MI-2E',
            'department' => 'Jurusan Teknologi Informasi',
            'phone_number' => '082139075954',
        ]);
    }
}