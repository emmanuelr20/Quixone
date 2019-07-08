<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuizTypesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(QuestionTypesTableSeeder::class);
        $this->call(QuestionLevelsTableSeeder::class);
    }
}
