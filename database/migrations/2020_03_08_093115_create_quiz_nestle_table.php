<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizNestleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_nestle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('quiz_id');
            $table->string('ques1');
            $table->string('ques2');
            $table->string('ques3');
            $table->string('ques4');
            $table->string('ques5');
            $table->string('ques6');
            $table->string('ques7');
            $table->string('ques8');
            $table->string('ques9');
            $table->string('ques10');
            $table->timestamp('strated_at');
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
        Schema::drop('quiz_nestle');
    }
}
