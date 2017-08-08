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
    public function getLecturer()
    {
        $data = lecturers::pluck('name', 'id')->all();
        return json_encode($data);
    }

    public function updateMm_assignment(Request $request)
    {
        $test = $request->input('id');
        return $test;
    }

    public function test()
    {
        return 10;
    }
}
