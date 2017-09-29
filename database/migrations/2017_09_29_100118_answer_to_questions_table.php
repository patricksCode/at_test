<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnswerToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_to_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->index(['question_id', 'answer_id']);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_to_questions', function (Blueprint $table) {
            Schema::dropIfExists('answer_to_questions');
            //
        });
    }
}
