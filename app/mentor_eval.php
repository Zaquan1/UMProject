<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mentor_eval extends Model
{
    protected $fillable = [
    	'mm_eval_id',
        'location',
        'main_issue',
        'other_issue',
        'outcome',
        'discussed_strategy',
        'purpose',
        'i_find_my_mentee',
        'time_spent_with_mentee_was',
        'mentor_mentee_programme_is',
        'suggestion_and_comment'
    ];
}
