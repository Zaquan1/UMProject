<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorEvaluationFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->title = "Dashboard > Mentor Evaluation";
    }

    public function index()
    {
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
