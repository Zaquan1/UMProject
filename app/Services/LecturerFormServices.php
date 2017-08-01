<?php

namespace App\Services;
use App\departments;

class LecturerFormServices
{
    public function getInfo()
    {
        $data['department'] = departments::all();
        return $data;
    }
}