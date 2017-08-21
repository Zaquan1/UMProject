<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use App\services\StudentFormServices as LForm;
use App\services\UserUpdateServices as UserUpdate;
use App\services\DataTableServices as DataTable;

class StudentsController extends Controller
{
    public function __construct(LForm $lForm, UserUpdate $up, DataTable $dataTable)
    {
        $this->middleware('auth');
        $this->lForm = $lForm;
        $this->up = $up;
        $this->dataTable = $dataTable;
        $this->title = "Dashboard > Students";
    }

    public function index()
    {
        $data['students'] = students::with('cohort', 'mm_assignments')->get();
        $data['title'] = $this->title;
        //return $data;
        return view('users.students.index')->with('data', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data['student'] = students::with(['mm_assignments.lecturers.department', 'mm_assignments.mm_evals'])->find($id);
        $data['title'] = $this->title . " > " . $data['student']->name;
        //return $data;
        return view('users.students.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data['student'] = students::with(['cohort', 'mm_assignments.lecturers'])->find($id);
        $data['title'] = $this->title . " > " . $data['student']->name . " > Edit";
        $data['form']['cohort'] = $this->lForm->getInfo();
        $data['form']['availLect'] = $this->lForm->lectNoCohortIn($data['student']->cohort_id);
        if(!empty($data['student']->mm_assignments->lecturer_id))
        {
            $data['form']['availLect'][$data['student']->mm_assignments->lecturer_id] = $data['student']->mm_assignments->lecturers->name;
        }
        $data['form']['availLect'][null] = 'None';
        //return $data;
        return view('users.students.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $student = students::with('mm_assignments')->find($id);
        $this->up->UpdateStud($student, $request->all());

        return redirect(route('students.show', $id));
    }

    public function destroy($id)
    {
        //
    }
}
