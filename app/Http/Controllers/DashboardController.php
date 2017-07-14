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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dashboard";
        return view('pages.dashboard')->with('title', $title);
    }

    public function test()
    {
        $assign = new mm_assignments;
        $student = new students;
        $student->name = "testSubject1";
        $student->email = "test@yahoo.com";
        $cstudent = students::create($student);
        $cstudent->mm_assignments()->save($assign);
        //$test = \Auth::user()->password;
        return redirect('/dashboard'); 
    }
}
