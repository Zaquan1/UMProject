<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mentee_eval;
use App\mm_eval;

class MenteeEvaluationFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->title = "Dashboard > Mentee Evaluation";
    }


    public function index()
    {
        $data['title'] = $this->title;

        return view('EvaluationForm.students.EvaluationForm')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $my_mentor_was = implode(" , ", $request->get('my_mentor_was'));
        //return $my_mentor_was;

        return $request->all();
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
