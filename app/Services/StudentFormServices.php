<?php

namespace App\Services;
use App\cohorts;
use App\services\DataTableServices as DataTable;

class StudentFormServices
{
    public function __construct(DataTable $dataTable)
    {
        $this->dataTable = $dataTable;
    }

    public function getInfo()
    {
        $data = cohorts::pluck('year', 'id')->all();
        return $data;
    }

    public function lectNoCohortIn($cohort)
    {
        return $this->dataTable->lectNoCohortIn($cohort);
    }
}