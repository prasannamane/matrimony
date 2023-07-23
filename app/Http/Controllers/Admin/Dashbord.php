<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Register as MdlRegister;
use Illuminate\Support\Facades\Session;
use App\Models\Religion;
use App\Models\Cast;
use App\Models\Districts;
use App\Models\City;
use App\Models\MarriageStatus;




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
        $condition['role_id'] = 0;

        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state', 'tbl_marriage_status.name as marriage_status')
            ->orderBy('register.id', 'DESC')
            ->where($condition)
            ->paginate(16);

        $title = 'Dashbord | Matrimony';

        return view('Admin/dashbord', ['title' => $title, 'register' => $register, 'user_session' => $user_session]);
    }

    public function non_active(Request $request)
    {
        $user_session = Session::get('user_session');
        $condition['role_id'] = 0;
        $condition['active'] = 1;
        $condition['verify'] = 0;        
        $condition['gender'] = 0;

        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state', 'tbl_marriage_status.name as marriage_status')
            ->orderBy('register.id', 'DESC')
            ->where($condition)
            ->paginate(12);

        $title = 'Dashbord | Matrimony';

        return view('Admin/dashbord', ['title' => $title, 'register' => $register, 'user_session' => $user_session]);
    }

    public function active($id)
    {
        $updateCon['active'] = 1;
        $validatedData['id'] = $id;
        MdlRegister::where($validatedData)->update($updateCon);
        return back()->with('success', 'Profile Updated Activated!');
    }
}