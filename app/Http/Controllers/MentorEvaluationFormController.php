<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mentor_eval;
use App\mm_eval;

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
        //blank
    }

    public function store(Request $request)
    {
        //return $request->all();

        mentor_eval::create([
            'mm_eval_id' => 1, //just used to set the value to default
            'location' => $request->location,
            'main_issue' => $request->main_issue,
            'other_issue' => $request->other_issue,
            'outcome' => $request->outcome,
            'discussed_strategy' => $request->discussed_strategy,
            'purpose' => $request->purpose,
            'i_find_my_mentee' => $request->i_find_my_mentee,
            'time_spent_with_mentee_was' => $request->time_spent_with_mentee_was,
            'mentor_mentee_programme_is' => $request->mentor_mentee_programme_is,
            'suggestion_and_comment' => $request->suggestion_and_comment
        ]);

        return redirect('/dashboard/mentor_evaluation');
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
