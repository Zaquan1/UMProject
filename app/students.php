<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $table = "students";
    public $timestamps = false;

    public function mm_assignments()
    {
        return $this->hasOne('App\mm_assignments', 'mentee_id');
    }
}
