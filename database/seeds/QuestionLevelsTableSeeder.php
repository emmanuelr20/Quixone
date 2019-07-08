<?php

use Illuminate\Database\Seeder;

class QuestionLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_levels')->insert([
            'title' => 'Easy',
        ]);
        DB::table('question_levels')->insert([
            'title' => 'Hard',
        ]);
    }
}
