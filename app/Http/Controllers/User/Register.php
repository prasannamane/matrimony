<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use App\Exceptions\DBError;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class Register extends Controller
{
    public $errorInstance = 'DB error : ';

    public function __construct()
    {
    }

    public function index()
    {
        $religion = Religion::all();
        return view('User/register', ['religion' => $religion]);
        
    }


    public function submitform(Request $request)
    {
        print_r($request->first_name);
        
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'religion' => 'required',
        ]);

        print_r($validatedData);
        exit();

        //return redirect('/form')->with('success', 'Form submitted successfully.');
        
    }

    public function religion_retrieve()
    {
        try {
            print_r( Religion::all());
        } catch (Exception $e) {
            Log::error($this->errorInstance . $e);
            throw new DBError($e->getMessage());
        }
    }
}
