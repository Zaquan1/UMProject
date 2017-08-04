<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lecturers;
use Session;
use App\Services\RoleServices as Roles;
use App\services\LecturerFormServices as LForm;

class LecturersController extends Controller
{
    public function __construct(Roles $role, LForm $lForm)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
        $this->title = "Dashboard > Lecturers";
    }

    public function index()
    {
        $data = $this->role->getRole();
        $data['title'] = $this->title;
        //return $data;
        return view('users.lecturers.index')->with('data', $data);
        //return redirect('/dashboard');
    }

    public function create()
    {
        $user = Session::get( 'user' );
        $id = Session::get('id');
        $lecturer = new lecturers;
        $lecturer->user_id = $id;
        $lecturer->name = $user['name'];
        $lecturer->email = $user['email'];
        $lecturer->save();
        /*
        */
        return redirect('/register');
    }

    public function store(Request $request)
    {
        return '/dashboard';
    }

    public function show($id)
    {
        $data = $this->role->getRole();

        $data['lecturer'] = lecturers::find($id);
        $data['title'] = $this->title . " > " . $data['lecturer']->name;

        return view('users.lecturers.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = $this->role->getRole();
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
        $lecturer->name = $request->input('name');
        $lecturer->email = $request->input('email');
        $lecturer->department_id = $request->input('department');
        $lecturer->status = $request->input('status');
        $lecturer->save();
        return redirect('dashboard/lecturers');

    }

    public function destroy($id)
    {
        //
    }
}
