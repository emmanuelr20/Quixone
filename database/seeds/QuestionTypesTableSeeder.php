<?php

use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
        	'name' => 'objective',
        ]);  
        DB::table('question_types')->insert([
        	'name' => 'german',
        ]);
    }
}
