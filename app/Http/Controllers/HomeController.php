<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleServices as Roles;

class HomeController extends Controller
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
        $this->title = "Home";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function refer()
    {
        return view('reference_exp');
    }

    public function test()
    {
        $data = $this->role->getRole();
        $data['title'] = $this->title;
        return view('mm_assignments.index')->with('data', $data);
    }
}
