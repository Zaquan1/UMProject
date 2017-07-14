<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mm_assignments extends Model
{
    protected $table = "mm_assignments";
    public $timestamps = false;

    public function students()
    {
        return $this->belongsTo('App\students', 'mentee_id');
    }

    public function lecturers()
    {
        return $this->belongsTo('App\lecturers', 'mentor_id');
    }

    public function mm_evals()
    {
        return $this->hasMany('App\mm_evals', 'mm_assignment_id');
    }
}
