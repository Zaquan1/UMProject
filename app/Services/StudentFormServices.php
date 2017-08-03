<?php

namespace App\Services;
use App\cohorts;

class StudentFormServices
{
    public function getInfo()
    {
        $data['cohort'] = cohorts::pluck('year', 'id')->all();
        return $data;
    }
}