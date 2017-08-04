<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleServices as Roles;
use App\services\LecturerFormServices as LForm;

class MentorEvaluationFormController extends Controller
{
    public function __construct(Roles $role, LForm $lForm)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
        $this->title = "Dashboard > Mentor Evaluation";
    }

    public function index()
    {
        $data = $this->role->getRole();
        $data['title'] = $this->title;

        return view('EvaluationForm.Lecturers.EvaluationForm')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
