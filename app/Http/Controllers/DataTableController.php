<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\DataTableServices as DataTable;
use App\lecturers;

class DataTableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DataTable $dataTable)
    {
        $this->middleware('auth');
        $this->dataTable = $dataTable;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function getLect()
     {
         return lecturers::pluck('name', 'id')->all();
     }

    public function getLectFilter($cohort)
    {
        return json_encode($this->dataTable->lectNoCohortIn($cohort));
    }

    public function updateMm_assignment(Request $request)
    {
        $id = $request->input('id');
        $lId = $request->input('lId');
        $this->dataTable->updateAssignment($id, $lId);
        $choosenMentor = lecturers::find($lId);
        return $choosenMentor;
    }

    public function test($cohort)
    {
       $data = $this->dataTable->lectNoCohortIn($cohort);
        return $data;
    }
}
