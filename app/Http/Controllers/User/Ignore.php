<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest as MdlInterest;
use Illuminate\Support\Facades\Session;

class Ignore extends Controller
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
        $insertCon['action'] = 0;
        MdlInterest::insert($insertCon);
        return back()->with('success', 'Profile in Ignore List Added Successfully!');
    }
}
