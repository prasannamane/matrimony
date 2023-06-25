<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use App\Models\Countries;
use App\Models\States;
use App\Models\Register as MdlRegister;
use App\Exceptions\DBError;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Register extends Controller
{
    public $errorInstance = 'DB error : ';

    public function __construct()
    {
    }

    public function index()
    {
        //$countries = Countries::all(); //, 'countries' => $countries
        $religion = Religion::all();
        //$states = States::all();

        $condition['countries_id'] =  101;
        $states = States::where($condition)->get();

        return view('User/register', ['religion' => $religion, 'states' => $states]);
    }


    public function submitform(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'countries_id' => 'required',
            'states_id' => 'required',
        ]);

        $validatedData['age'] = $this->calculateAge($validatedData['dob']);
        $validatedData['dob'] = date("Y-m-d", strtotime($validatedData['dob']));

        $condition['mobile'] =  $validatedData['mobile'];
        $MdlRegister = MdlRegister::where($condition)->get();

        if ($MdlRegister->count() > 0) {
            return redirect('/register')->with('failed', 'This mobile number is already registered. Please use a different number OR Using same numner you can login now.');
        }

        try {
            $validatedData['password'] = md5($validatedData['password']);
            MdlRegister::insert($validatedData);
            return redirect('/login')->with("success", "Thank You for Submitting Your Registration Form! Account Activation and Verification Underway. Expect Confirmation Within 24 Hours.");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect('/register')->with('failed', 'Registration Form submission failed. Somwthing went wrong!.');
        }
    }

    public function login()
    {
        return view('User/login');
    }

    public function loginform(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $validatedData['password'] = md5($validatedData['password']);
        $MdlRegister = MdlRegister::where($validatedData)->get();

        if ($MdlRegister->count() > 0) {
            if ($MdlRegister[0]->active == 1) {
                Session::start();
                //SELECT `id`, `first_name`, `last_name`, `mobile`, `password`, `religion`, `created_at`, `updated_at`, `active`, `role_id`, `gender` FROM `register` WHERE 1

                $user_session['id'] = $MdlRegister[0]->id;
                $user_session['first_name'] = $MdlRegister[0]->first_name;
                $user_session['last_name'] = $MdlRegister[0]->last_name;
                $user_session['mobile'] = $MdlRegister[0]->mobile;
                $user_session['religion'] = $MdlRegister[0]->religion;
                $user_session['role_id'] = $MdlRegister[0]->role_id;
                $user_session['gender'] = $MdlRegister[0]->gender;


                Session::put('user_session', $user_session);
                return redirect('/dashbord')->with('success', 'Welcome ' . $MdlRegister[0]->first_name);
            } else {
                return redirect('/login')->with("failed", "Your Account is Not Activated!");
            }
        } else {
            return redirect('/login')->with("failed", "Mobile number OR Password is Wrong!");
        }
    }

    public function insert($insertArray)
    {
        try {
            //SearchRequests::insert($insertArray);
        } catch (Exception $e) {
            throw new DBError($e->getMessage());
        }
    }

    public function religion_retrieve()
    {
        try {
            print_r(Religion::all());
        } catch (Exception $e) {
            Log::error($this->errorInstance . $e);
            throw new DBError($e->getMessage());
            // Within your code
            Log::info('This is an informational log message.');
            Log::error('An error occurred.');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', "Thank you for being a valued member of our community. We look forward to your return. Log in again to continue your amazing journey with us!");
    }

    public function calculateAge($birthdate)
    {
        $now = Carbon::now();
        $birthdate = Carbon::parse($birthdate);
        return $birthdate->diffInYears($now);
    }
}
