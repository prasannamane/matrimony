<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Register as MdlRegister;
use Illuminate\Support\Facades\Session;

use App\Models\Religion;
use App\Exceptions\DBError;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;


class Dashbord extends Controller
{
    public $errorInstance = 'DB error : ';

    public function __construct()
    {
        $this->middleware('session.check');
    }

    public function index()
    {
        $user_session = Session::get('user_session');
        $condition['gender'] = 0;
        if ($user_session['gender'] == 0) {
            $condition['gender'] = 1;
        }
        $register = MdlRegister::where($condition)->get();
        return view('User/dashbord', ['register' => $register, 'user_session' => $user_session]);
    }
}
