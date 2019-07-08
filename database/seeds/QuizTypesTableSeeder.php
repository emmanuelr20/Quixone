<?php

use Illuminate\Database\Seeder;

class QuizTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_types')->insert([
            'title' => 'Sevens',
            'description' => 'This quiz you are given two questions from the three subjects you selected and a general question, if answered correctly you win #10,000. no compensation for failed quizzes',
            'is_active' => true
        ]);
        DB::table('quiz_types')->insert([
            'title' => 'Singles',
            'description' => 'This quiz you are given one question from the subject you selected, if answered correctly you win #5,000. no compensation for failed quizzes',
            'is_active' => true
        ]);
    }
}
