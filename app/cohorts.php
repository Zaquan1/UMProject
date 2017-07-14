<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cohorts extends Model
{
    protected $table = "cohorts";

    public function students()
    {
        return $this->hasMany('App\students', 'cohort_id');
    }
}
