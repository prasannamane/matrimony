<?php

namespace App\Http\Controllers\User;

use App\Exceptions\DBError;
use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\BusinessTypes;
use App\Models\Cast;
use App\Models\City;
use App\Models\Complexion;
use App\Models\Districts;
use App\Models\JobProfiles;
use App\Models\PhysicalDisabilitiesHandicaps as PhysicalDH;
use App\Models\Qualifications;
use App\Models\Register as MdlRegister;
use App\Models\Religion;
use App\Models\MarriageStatus;
use App\Models\States;
use App\Models\ViewProfile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;


class Dashbord extends Controller
{
    public $errorInstance = 'DB error : ';
    public $user_session;

    public function __construct()
    {
        $this->middleware('session.check');
    }

    public function index(Request $request)
    {
        $user_session = Session::get('user_session');
        $condition['gender'] = 0;
        $condition['role_id'] = 0;
        //$condition['register.religion_id'] = $user_session['religion_id'];
        //$condition['register.states_id'] = $user_session['states_id'];

        if ($user_session['gender'] == 0) {
            $condition['gender'] = 1;
        }

        if ($request->input('religion_id') !== null) {
            $condition['register.religion_id'] = $request->input('religion_id');
        }

        if ($request->input('cast_id') !== null) {
            $condition['register.cast_id'] = $request->input('cast_id');
        }

        if ($request->input('districts_id') !== null) {
            $condition['register.districts_id'] = $request->input('districts_id');
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

        $preCondition['register_id'] =  $user_session['id'];
        //$preCondition['action'] =  1;

        $restrictedAges = DB::table('interest')
            ->where($preCondition)
            ->pluck('profile_id')
            ->toArray();

        //DB::enableQueryLog(); 
        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            //->leftJoin('interest', 'register.id', '=', 'interest.profile_id')
            ->select(
                'register.*',
                'tbl_religion.name as religion',
                'tbl_cast.name as cast',
                'tbl_states.name as state',
                'tbl_marriage_status.name as marriage_status'
            )
            ->where($condition)
            ->whereNotIn('register.id', $restrictedAges)
            ->orderBy('register.id', 'DESC')
            ->whereBetween('age', [$from_age, $to_age])
            ->paginate(12);

        /*SELECT * FROM `interest` 
            WHERE register_id = 128;*/

        //dd(DB::getQueryLog());

        if (isset($condition['register.religion_id']) == 0) {
            $condition['register.religion_id'] = 0;
        }

        if (isset($condition['register.cast_id']) == 0) {
            $condition['register.cast_id'] = 0;
        }

        if (isset($condition['register.districts_id']) == 0) {
            $condition['register.districts_id'] = 0;
        }

        if (isset($condition['register.states_id']) == 0) {
            $condition['register.states_id'] = 0;
        }

        $religion = Religion::all();
        $cast = Cast::all();
        $states = States::all();
        $districts = Districts::all();

        return view('User/dashbord', [
            'title' => 'Dashbord | Matrimony | Perfect Place',
            'register' => $register,
            'user_session' => $user_session,
            'from_age' => $from_age,
            'to_age' => $to_age,
            'religion' => $religion,
            'cast' => $cast,
            'districts' => $districts,
            'religion_select' => $condition['register.religion_id'],
            'cast_select' => $condition['register.cast_id'],
            'districts_select' => $condition['register.districts_id'],
            'state' => $states,
            'state_select' => $condition['register.states_id'],
            'dashbord' => 'active',
            'detail' => '',
            'profile' => '',
            'photo' => '',
            'personal' => '',
            'family' => '',
            'education' => '',
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
    }

    public function detail($id, $id2)
    {
        $user_session = Session::get('user_session');
        $insertCon['register_id'] = $user_session['id'];
        $view_profile = ViewProfile::where($insertCon)->get();

        /** Daily */
        $date = date('Y-m-d', time());
        $dateFrom =  $date . ' 00:00:00';
        $dateTo =  $date . ' 23:59:59';
        $date_view_profile = ViewProfile::whereBetween('created_at', [$dateFrom, $dateTo])->where($insertCon)->get();

        if ($user_session['role_id'] == 0) {
            if (($view_profile->count() > 10 && $user_session['gender'] == 0 && $user_session['verify'] == 0) || ($view_profile->count() > 100 && $user_session['gender'] == 1 && $user_session['verify'] == 0)) {
                $page = 'payment';
            } else if ($date_view_profile->count() > 15) {
                $page = 'limit_reached';
            } else {
                $page = 'detail';

                $insertCon['profile_id'] = $id;

                $view_profile = ViewProfile::where($insertCon)->get();

                if ($view_profile->count() > 0) {
                    $updateCon['attempt'] = $view_profile[0]->attempt + 1;
                    ViewProfile::where($insertCon)->update($updateCon);
                } else {
                    $insertCon['attempt'] = 1;
                    ViewProfile::insert($insertCon);
                }
            }
        } else {
            $page = 'detail';
        }

        $condition['register.id'] = $id;
        $condition['password'] = $id2;

        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->leftJoin('tbl_districts', 'register.districts_id', '=', 'tbl_districts.id')
            ->leftJoin('tbl_cities', 'register.cities_id', '=', 'tbl_cities.id')
            ->leftJoin('tbl_blood_group', 'register.blood_group_id', '=', 'tbl_blood_group.id')
            ->leftJoin('tbl_complexion', 'register.complexion_id', '=', 'tbl_complexion.id')
            ->leftJoin('tbl_qualifications', 'register.qualification_id', '=', 'tbl_qualifications.id')
            ->leftJoin('tbl_job_profiles', 'register.job_profile_id', '=', 'tbl_job_profiles.id')
            ->leftJoin('tbl_business_types', 'register.business_id', '=', 'tbl_business_types.id')
            ->leftJoin('tbl_physical_disabilities_handicaps', 'register.physical_dh_id', '=', 'tbl_physical_disabilities_handicaps.id')
            ->select(
                'register.*',
                'tbl_religion.name as religion',
                'tbl_cast.name as cast',
                'tbl_states.name as state',
                'tbl_marriage_status.name as marriage_status',
                'tbl_districts.name as district',
                'tbl_cities.name as city',
                'tbl_blood_group.name as blood_group',
                'tbl_complexion.name as complexion',
                'tbl_qualifications.name as qualifications',
                'tbl_job_profiles.name as job_profiles',
                'tbl_business_types.name as business_types',
                'tbl_physical_disabilities_handicaps.name as physical_dh',
            )
            ->where($condition)
            ->get();

        return view('User/' . $page, [
            'title' => 'Profile Detail | Matrimony | Perfect Place',
            'register' => $register,
            'user_session' => $user_session,
            'dashbord' => '',
            'detail' => 'active',
            'deactivate' => '',
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'photo' => '',
            'personal' => 'active',
            'family' => '',
            'education' => '',
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
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

        return view('User/profile_update', [
            'register' => $register[0],
            'user_session' => $user_session,
            'cast' => $cast,
            'district' => $districts,
            'city' => $city,
            'detail' => '',
            'profile' => 'active',
            'photo' => '',
            'personal' => '',
            'family' => '',
            'education' => '',
            'dashbord' => '',
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
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
            'expectations' => 'required',
            'about_me' => 'required'
        ]);

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Updated Successfully!');
    }

    public function profile_update_photo()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_photo', [
            'register' => $register[0],
            'user_session' => $user_session,
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'detail' => '',
            'photo' => 'active',
            'personal' => '',
            'family' => '',
            'education' => '',
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
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
        $physical_dh = PhysicalDH::all();
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        $blood_group = BloodGroup::all();
        $complexion = Complexion::all();
        return view('User/profile_update_personal', [
            'register' => $register[0], 'user_session' => $user_session, 'blood_group' => $blood_group,
            'complexion' => $complexion,
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'photo' => '',
            'personal' => 'active',
            'family' => '',
            'education' => '',
            'deactivated' => '',
            'physical_dh' => $physical_dh,
            'interest' => '',
            'ignore' => ''
        ]);
    }

    public function profile_update_personal_save(Request $request)
    {
        $validatedData = $request->validate([
            'blood_group_id' => 'required',
            'complexion_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'birth_time' => 'required',
            'birth_place' => 'required',
            'physical_dh_id' =>  'required'
        ]);
        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Personal Information Updated Successfully!');
    }

    public function profile_update_family()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_family', [
            'register' => $register[0],
            'user_session' => $user_session,
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'photo' => '',
            'personal' => '',
            'family' => 'active',
            'education' => '',
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
    }

    public function profile_update_family_save(Request $request)
    {

        $validatedData = $request->validate([
            'father_name' => 'required',
            'father_job' => 'required',
            'father_mobile' => 'required',
            'mother_name' => 'required',
            'mother_job' => 'required',
            'mother_mobile' => 'required',
            'brother_name' => 'required',
            'brother_count' => 'required',
            'sister_name' => 'required',
            'sister_count' => 'required',
        ]);

        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Family Information Updated Successfully!');
    }

    public function profile_update_education()
    {
        $qualifications = Qualifications::all();
        $job_profile = JobProfiles::all();
        $business = BusinessTypes::all();

        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_education_job', [
            'register' => $register[0], 'user_session' => $user_session,
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'photo' => '',
            'personal' => '',
            'family' => '',
            'education' => 'active',
            'qualifications' => $qualifications,
            'job_profile' => $job_profile,
            'business' => $business,
            'deactivated' => '',
            'interest' => '',
            'ignore' => ''
        ]);
    }

    public function profile_update_education_save(Request $request)
    {
        $validatedData = $request->validate([
            'qualification_id' => 'required',
            'job_profile_id' => 'required',
            'job_location' => 'required',
            'company_name' => 'required',
            'salary' => 'required',
            'business_id' => 'required',
            'erning' => 'required',
        ]);

        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];

        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Profile Education and Job Information Updated Successfully!');
    }

    public function profile_update_deactivate()
    {
        $user_session = Session::get('user_session');
        $condition['register.id'] = $user_session['id'];
        $register = MdlRegister::where($condition)->get();
        return view('User/profile_update_deactivate', [
            'register' => $register[0], 'user_session' => $user_session,
            'profile' => '',
            'dashbord' => '',
            'detail' => '',
            'photo' => '',
            'personal' => '',
            'family' => '',
            'education' => '',
            'deactivated' => 'active',
            'interest' => '',
            'ignore' => ''
        ]);
    }

    public function profile_update_deactivate_save(Request $request)
    {
        $validatedData['active']  = 0;
        $user_session = Session::get('user_session');
        $condition['id'] = $user_session['id'];
        MdlRegister::where($condition)->update($validatedData);
        return back()->with('success', 'Your Profile Deactivated Successfully Updated Successfully!');
    }

    public function getCastByReligionApi(Request $request)
    {

        if ($request->input('cast_id') !== null) {
            $condition['register.religion_id'] = $request->input('cast_id');
        }

        $cast = Cast::where($condition)->get();

        return response()->json(['message' => 'POST request received', 'data' => $cast], 200);

    }
}
