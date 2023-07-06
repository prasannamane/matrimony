<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Home;
use App\Http\Controllers\User\Register;
use App\Http\Controllers\User\Dashbord;


use App\Http\Controllers\Admin\Login;
use App\Http\Controllers\Admin\Dashbord as DashbordAdmin; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/



/** User Start */

Route::get('/', [Home::class, 'index']);

Route::get('/register', [Register::class, 'index']);
Route::post('/submitform', [Register::class, 'submitform']);

Route::get('/login', [Register::class, 'login']);
Route::post('/loginform', [Register::class, 'loginform']);
Route::get('/logout', [Register::class, 'logout']);

Route::get('/dashbord', [Dashbord::class, 'index']);
Route::post('/dashbord', [Dashbord::class, 'index']);

Route::get('/detail/{id}/{id2}', [Dashbord::class, 'detail']);

Route::get('/profile_update', [Dashbord::class, 'profile_update']);
Route::post('/profile_update_save', [Dashbord::class, 'profile_update_save']);

Route::get('/profile_update_photo', [Dashbord::class, 'profile_update_photo']);
Route::post('/profile_update_photo_save', [Dashbord::class, 'profile_update_photo_save']);



Route::get('/term_condition', [Register::class, 'term_condition']);
Route::get('/send_otp', [Register::class, 'send_otp']);

/** User End */


/** Admin Start */

Route::get('/login_admin', [Login::class, 'login']);
Route::post('/loginform_admin', [Login::class, 'loginform']);
Route::get('/logout_admin', [Login::class, 'logout']);

Route::get('/dashbord_admin', [DashbordAdmin::class, 'index']);
Route::post('/dashbord_admin', [Dashbord::class, 'index']);

Route::get('/active/{id}', [DashbordAdmin::class, 'active']);



/** Admin End */