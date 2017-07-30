<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mm_assignments;
use Session;
use App\Services\RoleServices as Roles;

class Mm_assignmentsController extends Controller
{

    public function __construct(Roles $role)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->title = "Dashboard > Mentor Mentee";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->role->getRole();
        $data['title'] = $this->title;
        $data['assignments'] = mm_assignments::with(['lecturers', 'students'])
            ->orderBy(\DB::raw('-mentor_id'))->get();
        //return $data;
        return view('mm_assignments.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Session::get('id');
        $assignment = new mm_assignments;
        $assignment->mentee_id = $id;
        $assignment->save();
        return redirect('/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}