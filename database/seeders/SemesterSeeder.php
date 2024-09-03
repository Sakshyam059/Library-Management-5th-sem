<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('semesters')->count() == 0){
            $semesters=  [
                [
                  'semester' => 'First'
                ],
                [
                  'semester' => 'Second'
                  
                ],
                [
                  'semester' => 'Third'
                ],
                [
                  'semester' => 'Fourth'
                ],
                [
                  'semester' => 'Fifth'
                ],
                [
                  'semester' => 'Sixth'
                ],
                [
                  'semester' => 'Seventh'
                ],
                [
                  'semester' => 'Eighth'
                ]
              
              ];
    
              Semester::insert($semesters);
            }
      
    }
}
