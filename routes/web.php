<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Home;
use App\Http\Controllers\User\Register;
use App\Http\Controllers\User\Dashbord;
use App\Http\Controllers\User\Interest;
use App\Http\Controllers\User\Ignore;


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

Route::get('/interest/{id}/{id2}', [Interest::class, 'index']);
Route::get('/interest', [Interest::class, 'display']);

Route::get('/ignore/{id}/{id2}', [Ignore::class, 'index']);
Route::get('/ignore', [Ignore::class, 'display']);

Route::get('/profile_update', [Dashbord::class, 'profile_update']);
Route::post('/profile_update_save', [Dashbord::class, 'profile_update_save']);

Route::get('/profile_update_photo', [Dashbord::class, 'profile_update_photo']);
Route::post('/profile_update_photo_save', [Dashbord::class, 'profile_update_photo_save']);

Route::get('/profile_update_personal', [Dashbord::class, 'profile_update_personal']);
Route::post('/profile_update_personal_save', [Dashbord::class, 'profile_update_personal_save']);

Route::get('/profile_update_family', [Dashbord::class, 'profile_update_family']);
Route::post('/profile_update_family_save', [Dashbord::class, 'profile_update_family_save']);

Route::get('/profile_update_education', [Dashbord::class, 'profile_update_education']);
Route::post('/profile_update_education_save', [Dashbord::class, 'profile_update_education_save']);

Route::get('/term_condition', [Register::class, 'term_condition']);
Route::get('/send_otp', [Register::class, 'send_otp']);

Route::get('/profile_update_deactivate', [Dashbord::class, 'profile_update_deactivate']);
Route::post('/profile_update_deactivate_save', [Dashbord::class, 'profile_update_deactivate_save']);



/** User End */


/** Admin Start */

Route::get('/login_admin', [Login::class, 'login']);
Route::post('/loginform_admin', [Login::class, 'loginform']);
Route::get('/logout_admin', [Login::class, 'logout']);

Route::get('/dashbord_admin', [DashbordAdmin::class, 'index']);
Route::post('/dashbord_admin', [Dashbord::class, 'index']);

Route::get('/non_active', [DashbordAdmin::class, 'non_active']);

Route::get('/active/{id}', [DashbordAdmin::class, 'active']);   
/** Admin End */