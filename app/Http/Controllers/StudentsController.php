<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Session;
use App\Services\RoleServices as Roles;
use App\services\StudentFormServices as LForm;

class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Roles $role, LForm $lForm)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
        $this->title = "Dashboard > Students";
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
        //return $data;
        return view('users.students.index')->with('data', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Session::get( 'user' );
        $id = Session::get('id');
        $student = new students;
        $student->user_id = $id;
        $student->name = $user['name'];
        $student->email = $user['email'];
        $student->save();
        return redirect()->action('Mm_assignmentsController@create')
            ->with('id', $student->id);
        //return redirect('/register');//$request->input('name');//redirect('/');
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
        $data = $this->role->getRole();
        $data['student'] = students::with('cohort')->find($id);
        $data['title'] = $this->title . " > " . $data['student']->name . " > Edit";
        $data['form'] = $this->lForm->getInfo();
        //return $data;
        return view('users.students.edit')->with('data', $data);
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
