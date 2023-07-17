<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use App\Models\Countries;
use App\Models\States;
use App\Models\MarriageStatus;
use App\Models\Register as MdlRegister;
use App\Exceptions\DBError;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Twilio\Rest\Client;

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

        $marriage_status = MarriageStatus::all();

        return view('User/register', ['religion' => $religion, 'states' => $states, 'marriage_status' => $marriage_status]);
    }

    /*
    public function generateRandomNumber()
    {
        $min = 1000; // Minimum 4-digit number
        $max = 9999; // Maximum 4-digit number
        return mt_rand($min, $max);
    }
    */


    public function submitform(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'mobile' => 'required|numeric',
            'religion_id' => 'required|numeric',
            'gender' => 'required|numeric',
            'year_id' => 'required|numeric',
            'month_id' => 'required|numeric',
            'day_id' => 'required|numeric',
            'countries_id' => 'required|numeric',
            'states_id' => 'required|numeric',
            'marriage_status_id' => 'required|numeric',
            'password' => 'required',
        ]);

        $validatedData['dob'] = $validatedData['year_id'] . '-' . $validatedData['month_id'] . '-' . $validatedData['day_id'];
        unset($validatedData["year_id"]);
        unset($validatedData["month_id"]);
        unset($validatedData["day_id"]);
        $validatedData['age'] = $this->calculateAge($validatedData['dob']);

        if ($validatedData['gender'] == 0) {
            $validatedData['image'] = 'male_blur.png';
        } else {
            $validatedData['image'] = 'female_blur.png';
        }

        $validatedData['active'] = 1;

        $condition['mobile'] =  $validatedData['mobile'];
        $MdlRegister = MdlRegister::where($condition)->get();

        if ($MdlRegister->count() > 0) {
            return redirect('/register')->with('failed', 'This mobile number is already registered. Please use a different number OR Using same numner you can login now.');
        }

        try {
            $validatedData['plain_password'] = $validatedData['password'];
            $validatedData['password'] = md5($validatedData['password']);
            MdlRegister::insert($validatedData);
            //Account Activation and Verification Underway.  Expect Confirmation Within 24 Hours. We will share you Username & Password.
            return redirect('/login')->with("success", "Thank You for Submitting Your Registration Form! You can login now.");
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
        //$validatedData['role_id'] = 0;
        $MdlRegister = MdlRegister::where($validatedData)->get();

        if ($MdlRegister->count() > 0) {
            if ($MdlRegister[0]->active == 1) {
                Session::start();
                //SELECT `id`, `first_name`, `last_name`, `mobile`, `password`, `religion`, `created_at`, `updated_at`, `active`, `role_id`, `gender` FROM `register` WHERE 1

                $user_session['id'] = $MdlRegister[0]->id;
                $user_session['first_name'] = $MdlRegister[0]->first_name;
                $user_session['last_name'] = $MdlRegister[0]->last_name;
                $user_session['mobile'] = $MdlRegister[0]->mobile;
                $user_session['religion_id'] = $MdlRegister[0]->religion_id;
                $user_session['role_id'] = $MdlRegister[0]->role_id;
                $user_session['gender'] = $MdlRegister[0]->gender;
                $user_session['image'] = $MdlRegister[0]->image;
                $user_session['states_id'] = $MdlRegister[0]->states_id;


                Session::put('user_session', $user_session);

                $updateData['login_attempt'] =  $MdlRegister[0]->login_attempt + 1;
                $updateData['last_login'] = date('Y-m-d H:i:s');
                MdlRegister::where($validatedData)->update($updateData);

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

    public function term_condition()
    {
        return view('User/term_condition');
    }

    public function send_otp()
    {

        // Your Twilio account SID and Auth Token
        $accountSid = 'ACa544691a6149605a19ea6ddf69363360';
        $authToken = '83b5cef6db0e70a0abb31a22b02fab3e';

        // Your Twilio phone number
        $fromNumber = '+16183614215';

        // Recipient's phone number
        $toNumber = '+919686673567';

        // Message content
        $message = 'Hello, this is a test message!';

        // Initialize the Twilio client
        $client = new Client($accountSid, $authToken);

        try {
            // Send the SMS message
            $client->messages->create(
                $toNumber,
                [
                    'from' => $fromNumber,
                    'body' => $message,
                ]
            );

            echo 'SMS sent successfully!';
        } catch (Exception $e) {
            echo 'Error sending SMS: ' . $e->getMessage();
        }
    }
}
