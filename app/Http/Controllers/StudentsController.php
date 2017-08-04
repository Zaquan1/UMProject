<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Session;
use App\Services\RoleServices as Roles;
use App\services\StudentFormServices as LForm;
use App\services\UserUpdateServices as UserUpdate;

class StudentsController extends Controller
{
    public function __construct(Roles $role, LForm $lForm, UserUpdate $up)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
        $this->up = $up;
        $this->title = "Dashboard > Students";
    }

    public function index()
    {
        $data = $this->role->getRole();
        $data['title'] = $this->title;
        //return $data;
        return view('users.students.index')->with('data', $data);
        //
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
        $data = $this->role->getRole();

        $data['student'] = students::find($id);
        $data['title'] = $this->title . " > " . $data['student']->name;

        return view('users.students.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = $this->role->getRole();
        $data['student'] = students::with('cohort')->find($id);
        $data['title'] = $this->title . " > " . $data['student']->name . " > Edit";
        $data['form'] = $this->lForm->getInfo();
        //return $data;
        return view('users.students.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $student = students::find($id);
        $this->up->UpdateStud($student, $request->all());

        return redirect(route('students.show', $id));
    }

    public function destroy($id)
    {
        //
    }
}
