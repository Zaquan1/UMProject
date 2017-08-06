<?php

namespace App\Services;

use App\mm_assignments;

class DataTableServices
{
    public function updateAssignment($id, $lId)
    {
        $assignment = mm_assignment::find($id);
        $assignment->lecturer_id = $lId;
        $assignment->save();
    }
}