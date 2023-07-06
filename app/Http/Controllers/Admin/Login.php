<?php

namespace App\Http\Controllers\Admin;

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

class Login extends Controller
{
    public $errorInstance = 'DB error : ';

    public function __construct()
    {
    }

    public function login()
    {
        return view('Admin/login');
    }

    public function loginform(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $validatedData['password'] = md5($validatedData['password']);
        $validatedData['role_id'] = 1;
        $MdlRegister = MdlRegister::where($validatedData)->get();

        if ($MdlRegister->count() > 0) {
            if ($MdlRegister[0]->active == 1) {
                Session::start();
                //SELECT `id`, `first_name`, `last_name`, `mobile`, `password`, `religion`, `created_at`, `updated_at`, `active`, `role_id`, `gender` FROM `register` WHERE 1

                $user_session['id'] = $MdlRegister[0]->id;
                $user_session['first_name'] = $MdlRegister[0]->first_name;
                $user_session['last_name'] = $MdlRegister[0]->last_name;
                $user_session['mobile'] = $MdlRegister[0]->mobile;
                $user_session['role_id'] = $MdlRegister[0]->role_id;
                $user_session['image'] = $MdlRegister[0]->image;


                Session::put('user_session', $user_session);
                return redirect('/dashbord_admin')->with('success', 'Welcome ' . $MdlRegister[0]->first_name);
            } else {
                return redirect('/login_admin')->with("failed", "Your Account is Not Activated!");
            }
        } else {
            return redirect('/login_admin')->with("failed", "Mobile number OR Password is Wrong!");
        }
    }




    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', "Thank you for being a valued member of our community. We look forward to your return. Log in again to continue your amazing journey with us!");
    }
}
