<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Home;
use App\Http\Controllers\User\Register;
use App\Http\Controllers\User\Dashbord;

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




Route::get('/', [Home::class, 'index']);

Route::get('/register', [Register::class, 'index']);
Route::post('/submitform', [Register::class, 'submitform']);

Route::get('/login', [Register::class, 'login']);
Route::post('/loginform', [Register::class, 'loginform']);
Route::get('/logout', [Register::class, 'logout']);

Route::get('/dashbord', [Dashbord::class, 'index']);
Route::post('/dashbord', [Dashbord::class, 'index']);

Route::get('/detail/{id}/{id2}', [Dashbord::class, 'detail']);
