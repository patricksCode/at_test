<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
