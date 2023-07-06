<?php

namespace App\Http\Controllers\User;

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
        $condition['gender'] = 0;
        $condition['role_id'] = 0;
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
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state', 'tbl_marriage_status.name as marriage_status')
            ->where($condition)
            ->whereBetween('age', [$from_age, $to_age])
            ->paginate(16);

        $title = 'Dashbord | Matrimony';

        return view('User/dashbord', ['title' => $title, 'register' => $register, 'user_session' => $user_session, 'from_age' => $from_age, 'to_age' => $to_age]);
    }

    public function detail($id, $id2)
    {
        $user_session = Session::get('user_session');

        $condition['register.id'] = $id;
        $condition['password'] = $id2;

        
        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->leftJoin('tbl_districts', 'register.districts_id', '=', 'tbl_districts.id')
            ->leftJoin('tbl_cities', 'register.cities_id', '=', 'tbl_cities.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state', 'tbl_marriage_status.name as marriage_status', 'tbl_districts.name as district', 'tbl_cities.name as city')
            ->where($condition)
            ->get();

        $title = 'Profile Detail | Matrimony';
        return view('User/detail', ['title' => $title, 'register' => $register, 'user_session' => $user_session]);
    }

    public function profile_update()
    {

        $user_session = Session::get('user_session');

        $condition['register.id'] = $user_session['id'];
        $register = DB::table('register')
            ->join('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->join('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state')
            ->where($condition)
            ->get();

        $conditionRe['religion_id'] = $register[0]->religion_id;
        $cast = Cast::where($conditionRe)->get();

        $conditionDi['state_id'] = $register[0]->states_id;
        $districts = Districts::where($conditionDi)->get();

        $conditionCt['state_id'] = $register[0]->states_id;
        $city = City::where($conditionCt)->get();

        return view('User/profile_update', ['register' => $register[0], 'user_session' => $user_session, 'cast' => $cast, 'district' => $districts, 'city' => $city]);
    }

    public function profile_update_save(Request $request)
    {

        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];

        $validatedData = $request->validate([
            'districts_id' => 'required',
            'cities_id' => 'required',
            'cast_id' => 'required',
        ]);

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Updated Successfully!');
    }

    public function profile_update_photo()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_photo', ['register' => $register[0], 'user_session' => $user_session]);
    }

    public function profile_update_photo_save(Request $request)
    {
        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('img/profile'), $imageName);
        $request->except('image');

        $validatedData['image'] = $imageName;

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Photo Updated Successfully!');
    }
}
