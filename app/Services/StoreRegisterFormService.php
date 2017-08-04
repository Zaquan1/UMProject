<?php

namespace App\Services;
use App\user;
use App\students;
use App\lecturers;
use App\mm_assignments;

class StoreRegisterFormService
{
    public function register($user, $id)
    {
        if($user['role'] == 'lecturer')
        {
            $this->registerLecturer($user, $id);
        }
        elseif($user['role'] == 'student')
        {
            $this->registerStudent($user, $id);
        }
    }

    public function registerLecturer($user, $id)
    {
        $lecturer = new lecturers;
        $lecturer->user_id = $id;
        $lecturer->name = $user['name'];
        $lecturer->email = $user['email'];
        $lecturer->department_id = $user['department'];
        $lecturer->status = $user['status'];
        $lecturer->save();
    }

    public function registerStudent($user, $id)
    {
         $student = new students;
        $student->user_id = $id;
        $student->name = $user['name'];
        $student->email = $user['email'];
        $student->cohort_id = $user['cohort'];
        $student->save();
        $this->registerStudentMm_assignment($student->id);
    }

    public function registerStudentMm_assignment($id)
    {
        $mm_assignment = new mm_assignments;
        $mm_assignment->student_id = $id;
        $mm_assignment->save();
    }
}