<?php

namespace App\Services;

class DashboardInfoServices
{
    public function getInfo()
    {
        $data['lecturers'] = \Auth::user()->where('role', 'lecturer')->with('lecturer.mm_assignments', 'lecturer.department')->get();
        $data['students'] = \Auth::user()->where('role', 'student')->with(['student.mm_assignments', 'student.cohort'])->get();
        return $data;
    }
}