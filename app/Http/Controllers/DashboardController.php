<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\RoleServices as Roles;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Roles $role)
    {
        $this->middleware('auth');
        $this->role = $role;
    }

    private function getRole()
    {
        //$this->data = $this->role->getRole();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dashboard";
        $data = $this->role->getRole();
        $data['title'] = $title;

        if(\Auth::user()->role == "admin")          { $route = 'pages.admin_dashboard'; }
        elseif (\Auth::user()->role == "lecturer")  { $route = 'pages.lecturer_dashboard'; }
        elseif(\Auth::user()->role == "student")    { $route = 'pages.student_dashboard'; }
        
        return view($route)->with('data', $data);
    }

    public function test()
    {
        /*
        $assign = new mm_assignments;
        $student = new students;
        $student->name = "testSubject1";
        $student->email = "test@yahoo.com";
        $cstudent = students::create($student);
        $cstudent->mm_assignments()->save($assign);
        //$test = \Auth::user()->password;
        return redirect('/dashboard');

        */
        //$test = $this->user->all();
        return \Auth::user()->name;//$this->user->name;
    }
}
