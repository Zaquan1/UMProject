<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\students;
use App\mm_assignments;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = \Auth::User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dashboard";
        $data['title'] = $title;
        if (\Auth::user()->role == "lecturer")
        {
            $user = \Auth::user()->lecturer()->with('mm_assignments.students')->get();
            $route = 'pages.lecturer_dashboard';
        }
        elseif(\Auth::user()->role == "student")
        {
            $user = \Auth::user()->student()->with('mm_assignments.lecturers')->get();
            $route = 'pages.student_dashboard';
        }
        $data['user'] = $user[0];
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
