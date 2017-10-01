<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnswersToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_to_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->tinyInteger('order', false, true);
            $table->index(['question_id', 'answer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers_to_questions', function (Blueprint $table) {
            //
        });
    }
}
