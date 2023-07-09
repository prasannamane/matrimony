<?php

namespace App\Http\Controllers\User;

use App\Exceptions\DBError;
use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\Cast;
use App\Models\City;
use App\Models\Complexion;
use App\Models\Districts;
use App\Models\Register as MdlRegister;
use App\Models\Religion;
use App\Models\MarriageStatus;
use App\Models\States;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

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
        $condition['register.religion_id'] = $user_session['religion_id'];
        $condition['register.states_id'] = $user_session['states_id'];

        if ($user_session['gender'] == 0) {
            $condition['gender'] = 1;
        }


        if ($request->input('religion_id') !== null) {
            $condition['register.religion_id'] = $request->input('religion_id');
        }

        if ($request->input('states_id') !== null) {
            $condition['register.states_id'] = $request->input('states_id');
        }

        $from_age = $request->input('from_age');
        $to_age = $request->input('to_age');

        if ($from_age > 17 && $to_age < 61) {
        } else {
            $from_age = 18;
            $to_age = 60;
        }
        //DB::enableQueryLog(); 
        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->select('register.*', 'tbl_religion.name as religion', 'tbl_cast.name as cast', 'tbl_states.name as state', 'tbl_marriage_status.name as marriage_status')
            ->where($condition)
            ->whereBetween('age', [$from_age, $to_age])
            ->paginate(16);

        $title = 'Dashbord | Matrimony | Perfect Place';





        //dd(DB::getQueryLog());

        $religion = Religion::all();
        $states = States::all();

        return view('User/dashbord', [
            'title' => $title, 'register' => $register, 'user_session' => $user_session, 'from_age' => $from_age, 'to_age' => $to_age,
            'religion' => $religion, 'religion_select' => $condition['register.religion_id'],
            'state' => $states, 'state_select' => $condition['register.states_id']

        ]);
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

        $title = 'Profile Detail | Matrimony | Perfect Place';
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
            'adddress' => 'required',
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

    public function profile_update_personal()
    {

        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        $blood_group = BloodGroup::all();
        $complexion = Complexion::all();
        return view('User/profile_update_personal', ['register' => $register[0], 'user_session' => $user_session, 'blood_group' => $blood_group, 'complexion' => $complexion]);
    }

    public function profile_update_personal_save(Request $request)
    {
        print_r($request->input());


        $validatedData = $request->validate([
            'blood_group_id' => 'required',
            'complexion_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'birth_time' => 'required',
            'birth_place' => 'required',
        ]);

    }

    public function profile_update_family()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_family', ['register' => $register[0], 'user_session' => $user_session]);
    }

    public function profile_update_family_save()
    {
    }

    public function profile_update_education()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_education_job', ['register' => $register[0], 'user_session' => $user_session]);
    }

    public function profile_update_education_save()
    {
    }
}
