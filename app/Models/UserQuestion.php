<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserQuestion
 *
 * Container object that stores a question and the answer selected
 *
 * @package App\Models
 */
class UserQuestion extends Model
{

    /**
     * Gets a Relationship\Querybuilder object that allows you to retrieve question
     *
     * Many to One Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}
