<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest as MdlInterest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Interest extends Controller
{
    public $errorInstance = 'DB error : ';
    public $user_session;

    public function __construct()
    {
        $this->middleware('session.check');
    }

    public function index($id)
    {
        $user_session = Session::get('user_session');
        $insertCon['register_id'] = $user_session['id'];
        $insertCon['profile_id'] = $id;
        

        $intrest = MdlInterest::where($insertCon);
        
        if ($intrest->count() > 0) {
            $insertUpdate['action'] = 1;
            MdlInterest::where($insertCon)->update($insertUpdate);
        } else {
            $insertCon['action'] = 1;
            MdlInterest::insert($insertCon);
        }


        return back()->with('success', 'Profile in Interested List Added Successfully!');
    }

    public function display()
    {
        $user_session = Session::get('user_session');

        $condition['interest.register_id'] =  $user_session['id'];
        $condition['interest.action'] =  1;

        //DB::enableQueryLog(); 
        $register = DB::table('register')
            ->leftJoin('tbl_religion', 'register.religion_id', '=', 'tbl_religion.id')
            ->leftJoin('tbl_states', 'register.states_id', '=', 'tbl_states.id')
            ->leftJoin('tbl_cast', 'register.cast_id', '=', 'tbl_cast.id')
            ->leftJoin('tbl_marriage_status', 'register.marriage_status_id', '=', 'tbl_marriage_status.id')
            ->join('interest', 'register.id', '=', 'interest.profile_id')
            ->select(
                'register.*',
                'tbl_religion.name as religion',
                'tbl_cast.name as cast',
                'tbl_states.name as state',
                'tbl_marriage_status.name as marriage_status'
            )
            ->where($condition)
            ->orderBy('register.id', 'DESC')
            ->paginate(12);

        /*SELECT * FROM `interest` 
            WHERE register_id = 128;*/

        //dd(DB::getQueryLog());

        if (isset($condition['register.religion_id']) == 0) {
            $condition['register.religion_id'] = 0;
        }

        if (isset($condition['register.states_id']) == 0) {
            $condition['register.states_id'] = 0;
        }

        return view('User/interest', [
            'title' => 'Dashbord | Matrimony | Perfect Place',
            'register' => $register,
            'user_session' => $user_session,
            'dashbord' => '',
            'detail' => '',
            'profile' => '',
            'photo' => '',
            'personal' => '',
            'family' => '',
            'education' => '',
            'deactivated' => '',
            'interest' => 'active',
            'ignore' => ''
        ]);
    }
}
