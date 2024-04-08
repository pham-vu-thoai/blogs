<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);

// admin
Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::get('/forgotpassword',[AuthController::class,'forgotpassword']);
Route::get('/dashboard',[DashboardController::class,'dashboard']);
