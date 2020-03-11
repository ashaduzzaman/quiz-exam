<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('given_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('exam_id');
            $table->integer('question_id');
            $table->integer('choice_id');
            $table->integer('is_answer_right');
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
        Schema::drop('given_answers');
    }
}
