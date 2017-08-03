<?php

namespace App\Services;
use App\departments;

class LecturerFormServices
{
    public function getInfo()
    {
        $data['department'] = departments::pluck('name', 'id')->all();
        return $data;
    }
}