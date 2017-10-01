<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * Represents a question object
 *
 * @package App\Models
 */
class Question extends Model
{

    /**
     * Gets a Relationship\Querybuilder object that allows you to retrieve associated userQUestion objects
     * One to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userQuestions()
    {
        return $this->hasMany('App\Model\UserQuestion');
    }

    /**
     * Gets a Relationship\Querybuilder object that allows you to retrieve associated answers
     * Many to Many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer', 'answers_to_questions');
    }
}
