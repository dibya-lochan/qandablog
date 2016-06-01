<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [['id' => 1, 'questions_id' => 1, 'answers' => 'java framework', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], 
            ['id' => 2, 'questions_id' => 1, 'answers' => 'package', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'questions_id' => 1, 'answers' => 'php framework', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'questions_id' => 1, 'answers' => 'Programming Language', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'questions_id' => 2, 'answers' => 'Laravel Micro Framework', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'questions_id' => 2, 'answers' => 'Laravel CMS', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'questions_id' => 2, 'answers' => 'Design Pattern', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'questions_id' => 2, 'answers' => 'Applets', 'status' => 0, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]];
         foreach ($data as $key => $value) {
         	DB::table('answers')->insert([
            $key => $value
            
        ]);
         }
    }
}
