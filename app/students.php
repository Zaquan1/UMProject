<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $table = "students";
    public $timestamps = false;

    public function mm_assignments()
    {
        return $this->hasOne('App\mm_assignments', 'student_id');
    }

    public function cohort()
    {
        return $this->belongsTo('App\cohorts', 'cohort_id');
    }
}
