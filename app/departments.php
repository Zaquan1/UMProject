<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    protected $table = "departments";

    public function lecturers()
    {
        return $this->hasMany('App\lecturers', 'department_id');
    }
}
