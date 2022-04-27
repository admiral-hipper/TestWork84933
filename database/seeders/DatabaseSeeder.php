<?php

namespace Database\Seeders;

use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(
            [TeachersSeeder::class,
            StudentsSeeder::class]
        );
        foreach(Students::all() as $student){
            $teachers=Teachers::inRandomOrder()->take(rand(7,11))->pluck('id');
            $checker=0;
            foreach($teachers as $teacher){
            if(!$checker){
            $is_curator=rand(0,1);
            if($is_curator)
            $checker=1;
        }
            else $is_curator=0;
            $student->teachers()->attach($teacher,['is_curator'=>$is_curator]);
        }
        }
    }
}
