<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function userQuestions()
    {
        return $this->hasMany('App\Model\UserQuestion');
    }
    /*
     * this retrieves answers to the current question
     */
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer', 'answers_to_questions');
    }
}
