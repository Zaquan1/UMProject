<?php

namespace App\Services;

use App\mm_assignments;
use App\lecturers;
use App\cohorts;

class DataTableServices
{
    public function updateAssignment($id, $lId)
    {
        $assignment = mm_assignments::find($id);
        $assignment->lecturer_id = $lId;
        $assignment->save();
    }

    public function lectNoCohortIn($cohort_id)
    {
        $lect = \DB::table('mm_assignments')
        ->join('students', 'mm_assignments.student_id', '=', 'students.id')
        ->join('cohorts', 'students.cohort_id', '=', 'cohorts.id')
        ->where([
            ['lecturer_id', '!=', NULL],
            ['cohorts.id', '=', $cohort_id]
        ])
        ->select('lecturer_id')
        ->get();
        $lectsId = [];
        for($i = 0; $i < count($lect); $i++)
        {
            $lectsId[$i] = $lect[$i]->lecturer_id;
        }
        $lecturer = lecturers::whereNotIn('id', $lectsId)->pluck('name', 'id')->all();
        return $lecturer;//$lecturer;
    }
}