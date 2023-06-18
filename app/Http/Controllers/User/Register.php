<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use App\Models\Register as MdlRegister;
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
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'religion' => 'required', 
        ]);

        try{
            MdlRegister::insert($validatedData);
            return redirect('/login')->with('success', 'Form submitted successfully.');
        }
        catch(Exception $e) {
            Log::error($e->getMessage());
            return redirect('/register')->with('failed', 'Form submission failed.');
            //print_r($e->getMessage());
            //throw new DBError($e->getMessage());
        }      
    }

    public function login()
    {
        return view('User/login');
    }

    public function insert($insertArray){
        try{
            SearchRequests::insert($insertArray);
        }
        catch(Exception $e) {
            throw new DBError($e->getMessage());
        }   
    }

    public function religion_retrieve()
    {
        try {
            print_r( Religion::all());
        } catch (Exception $e) {
            Log::error($this->errorInstance . $e);
            throw new DBError($e->getMessage());
            // Within your code
Log::info('This is an informational log message.');
Log::error('An error occurred.');
        }
    }
}
