<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [['id' => 1, 'questions' => 'What is lumen?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], ['id' => 2, 'questions' => 'What is Laravel?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]];
         foreach ($data as $key => $value) {
         	DB::table('questions')->insert([
            $key => $value
            
        ]);
         }
         
    }
}
