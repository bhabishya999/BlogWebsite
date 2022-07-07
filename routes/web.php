<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginValidate;
use App\Http\Controllers\LoginController;


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

Route::get('/',[LoginController::class,'loginform']);
Route::post('/login',[LoginController::class,'login'])->middleware('loginvalidate');
