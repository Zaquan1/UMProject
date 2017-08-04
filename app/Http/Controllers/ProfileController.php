<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\lecturers;
use Session;
use App\Services\RoleServices as Roles;
use App\services\LecturerFormServices as LForm;

class ProfileController extends Controller
{
	public function __construct(Roles $role, LForm $lForm)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->lForm = $lForm;
        $this->title = "Dashboard > My Profile";
    }


    public function goToProfile($theName)
    {
    	$data['user'] = User::whereName($theName)->first();
    	$data['title'] = $this->title;

    	//return $data;

    	return view('profile.profile')->with('data', $data);
    }
}
