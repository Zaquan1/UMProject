<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\services\LecturerFormServices as LForm;
use App\services\StudentFormServices as SForm;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LForm $lForm, SForm $sForm)
    {
        $this->lForm = $lForm;
        $this->sForm = $sForm;
        //$this->middleware('auth');
        
    }

    public function showRegistrationForm()
{
    $data['lInfo'] = $this->lForm->getInfo();
    $data['sInfo'] = $this->sForm->getInfo();
    //return $data;
    return view('auth.register')->with('data', $data);
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string'
        ]);
    }

    public function register(Request $request)
{
    $this->validator($request->all())->validate();

    //event(new Registered($user = $this->create($request->all())));
    //The auto login code has been removed from here.
    $user = $this->create($request->all());
    if($request->input('role') == "lecturer")
        return redirect()->action('LecturersController@create')
            ->with('user', $request->all())
            ->with('id', $user->id);

    elseif($request->input('role') == "student")
        return redirect()->action('StudentsController@create')
            ->with('user', $request->all())
            ->with('id', $user->id);

    return redirect('/');
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role']
        ]);
        /*
        $student = new students;
        $student->name = $user->name;
        $student->email = $user->email;
        $student->cohort_id = 2;
        $student->metrix = "test";
        $user->student()->save($student);
        */
        
        return $user;
    }
}
