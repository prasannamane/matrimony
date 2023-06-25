<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Register as MdlRegister;
use Illuminate\Support\Facades\Session;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;


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

    public function index(Request $request)
    {
        $user_session = Session::get('user_session');
        $condition['gender'] = 0;
        if ($user_session['gender'] == 0) {
            $condition['gender'] = 1;
        }


        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');

        if ($from_age > 17 && $to_age < 60) {
        } else {
            $from_age = 18;
            $to_age = 60;
        }

        $register = DB::table('register')
            ->join('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->join('tbl_states', 'register.states_id', '=', 'tbl_states.id')

            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state')
            ->where($condition)
            ->whereBetween('age', [$from_age, $to_age])
            ->paginate(4);

        // dd($register);

        return view('User/dashbord', ['register' => $register, 'user_session' => $user_session, 'from_age' => $from_age, 'to_age' => $to_age]);
    }

    public function detail($id, $id2){
        print_r($id);
    }
}
