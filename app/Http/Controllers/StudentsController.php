<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Session;
use App\Services\RoleServices as Roles;
use App\services\StudentFormServices as LForm;

class StudentsController extends Controller
{
    public function __construct(Roles $role, LForm $lForm)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
