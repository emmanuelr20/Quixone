<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Option;
use Faker\Generator as Faker;

class QuestionsTableSeeder extends Seeder
{
    function __construct(Faker $faker)
	{
		$this->faker = $faker;
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j=0; $j < 5000; $j++) { 
    		$question = Question::create([
    		'body' => $this->faker->paragraph,
    		'subject_id' => rand(1,17),
    		'question_type_id' => 2,// rand(1,2),
    		'quiz_type_id' => rand(1,2),
    		'question_level_id' => rand(1,2),
	    	]);
	    	Option::create([
                'body' => 'An option',
                'question_id' => $question->id
            ]);
            Option::create([
                'body' => 'Another option',
                'question_id' => $question->id
            ]);
            Option::create([
                'body' => 'Yet Another option',
                'question_id' => $question->id
            ]);
            $option = Option::create([
                'body' => 'The Answer',
                'question_id' => $question->id
            ]);
	    	$question->answer_id = $option->id;
	    	$question->save();
    	}
    }
}
