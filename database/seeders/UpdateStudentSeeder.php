<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateStudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->update(['class_id' => 1]);
    }
}
