<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function __construct()
    {
        
    }

    public function index( )
    {
        return view('User/home');
    }
}
