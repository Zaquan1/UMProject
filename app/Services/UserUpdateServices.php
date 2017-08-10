<?php

namespace App\Services;
use App\lecturers;
use App\students;
use App\User;

class UserUpdateServices
{
    public function UpdateLect($lecturer, $updateL)
    {
        $lecturer->name = $updateL['name'];
        $lecturer->email = $updateL['email'];
        $lecturer->department_id = $updateL['department'];
        $lecturer->status = $updateL['status'];
        $lecturer->save();

        $user = User::find($lecturer->user_id);
        $user->name = $updateL['name'];
        $user->email = $updateL['email'];
        $user->save();
    }

    public function UpdateStud($student, $updateS)
    {
        $student->name = $updateS['name'];
        $student->email = $updateS['email'];
        $student->cohort_id = $updateS['cohort'];
        $student->mm_assignments->lecturer_id = $updateS['mentor'];
        $student->save();
        $student->mm_assignments->save();

        $user = User::find($student->user_id);
        $user->name = $updateS['name'];
        $user->email = $updateS['email'];
        $user->save();
    }

    public function test()
    {
        return 'meow';
    }
}