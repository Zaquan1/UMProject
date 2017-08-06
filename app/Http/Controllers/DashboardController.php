<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\DashboardInfoServices as Info;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Info $info)
    {
        $this->middleware('auth');
        $this->info = $info;
        $this->title = "Dashboard";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->info->getInfo();
        $data['title'] = $this->title;
        //return $data;
        return view('pages.dashboard')->with('data', $data);
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
