<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('courses')->count() == 0){
            $course =  [
                [
                  'course' => 'CSIT'
                ],
                [
                  'course' => 'BCA'
                  
                ],
                [
                  'course' => 'BIM'
                ]
              
              ];
    
              Course::insert($course);
            }
    }
}
