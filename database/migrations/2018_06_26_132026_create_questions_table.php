<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body')->nullable();
            $table->integer('subject_id')->nullable();
            //question type (i.e 1 for Objective, 2 for German)
            $table->integer('question_type_id')->nullable();
            $table->integer('answer_id')->nullable();
            //question category (i.e as related to quiz type)
            $table->integer('quiz_type_id')->nullable();
            //question level (i.e as related to quiz level 1 for easy, 2 for hard)
            $table->integer('question_level_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
