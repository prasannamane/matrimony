<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Register;

class Home extends Controller
{
    public function __construct()
    {
        
    }

    public function index( )
    {
        $femaleCount = Register::where('gender', '=', '1')->count();
        $maleCount = Register::where('gender', '=', '0')->count();

        
        return view('User/home', [
            'femaleCount' => $femaleCount + 1000,
            'maleCount' => $maleCount + 2000
        ]);
    }
}
