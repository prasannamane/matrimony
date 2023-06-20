<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use App\Models\Register as MdlRegister;
use App\Exceptions\DBError;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Dashbord extends Controller
{
    public $errorInstance = 'DB error : ';

    public function __construct()
    {
    }

    public function index()
    {
        $user_session = Session::get('user_session');
        print_r($user_session);
        
        $condition['gender'] = 0;
        if($user_session == 0){
            $condition['gender'] = 1;
        }
        
        $MdlRegister = MdlRegister::where($condition)->get();
        //return view('User/dashbord', ['religion' => $religion]);
    }


    public function submitform(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'religion' => 'required',
        ]);

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
                Session::put('user_session', $MdlRegister);
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
}
