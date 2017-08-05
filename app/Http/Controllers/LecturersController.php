<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lecturers;
use App\services\LecturerFormServices as LForm;
use App\services\UserUpdateServices as UserUpdate;

class LecturersController extends Controller
{
    public function __construct(LForm $lForm, UserUpdate $up)
    {
        $this->middleware('auth');
        $this->lForm = $lForm;
        $this->up = $up;
        $this->title = "Dashboard > Lecturers";
    }

    public function index()
    {   
        $data['lecturers'] = lecturers::with('department', 'mm_assignments')->get();
        $data['title'] = $this->title;
        //return $data;
        return view('users.lecturers.index')->with('data', $data);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        return '/dashboard';
    }

    public function show($id)
    {
        $data['lecturer'] = lecturers::find($id);
        $data['title'] = $this->title . " > " . $data['lecturer']->name;

        return view('users.lecturers.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data['lecturer'] = lecturers::with('department')->find($id); 
        $data['title'] = $this->title . " > " . $data['lecturer']->name . " > Edit";
        $data['form'] = $this->lForm->getInfo();
        //return $data;
        return view('users.lecturers.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $lecturer = lecturers::find($id);
        $this->up->UpdateLect($lecturer, $request->all());

        return redirect(route('lecturers.show', $id));
    }

    public function destroy($id)
    {
        //
    }
}
