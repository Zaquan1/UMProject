<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturers extends Model
{
    protected $table = "lecturers";
    public $timestamps = false;

    public function mm_assignments()
    {
        return $this->hasMany('App\mm_assignments', 'mentor_id');
    }
}
