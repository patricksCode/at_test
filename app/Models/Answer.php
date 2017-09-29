<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'answers_to_questions');
    }
}
