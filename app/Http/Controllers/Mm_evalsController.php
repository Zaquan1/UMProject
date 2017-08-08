<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mm_eval;
use Session;
use App\Services\RoleServices as Roles;

class Mm_evalsController extends Controller
{

    public function __construct(Roles $role)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->title = "Dashboard > Mentor Mentee > Evaluation";
    }

    public function index()
    {
        $data['title'] = $this->title;
        return view('mentor_mentee.mm_evals.index')->with('data', $data);
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
