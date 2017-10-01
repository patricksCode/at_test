<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Answer
 *
 * Represents an answer object
 *
 * @package App\Models
 */
class Answer extends Model
{

    /**
     *
     * Gets a Relationship\Querybuilder object that allows you to retrieve associated questions
     * Many to Many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'answers_to_questions');
    }
}
