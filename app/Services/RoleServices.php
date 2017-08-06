<?php

namespace App\Services;

class RoleServices
{
    public function __construct()
    {

    }

    public function getRole()
    {
        if(\Auth::user()->role == "admin")
        {
            $data['lecturers'] = \Auth::user()->where('role', 'lecturer')->with('lecturer.mm_assignments', 'lecturer.department')->get();
            $data['students'] = \Auth::user()->where('role', 'student')->with(['student.mm_assignments', 'student.cohort'])->get();
        }
        else
        {
            if (\Auth::user()->role == "lecturer")
            {
                $user = \Auth::user()->lecturer()->with('mm_assignments.students')->get();
            }
            elseif(\Auth::user()->role == "student")
            {
                $user = \Auth::user()->student()->with('mm_assignments.lecturers')->get();
            }
            $data['user'] = $user[0];
        }

        return $data;
    }
    public function test()
    {
        $user = \Auth::user()->lecturer()->with('mm_assignments.students')->get();
        return $user[0];
    }
}