<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\RoleController;



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

// //admin role

// Route::resource('admin/role','RoleController');
// Route::resource('admin/permission','PermissionController');

//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	// Users Routes
	Route::resource('admin/user','UserController');
	// Roles Routes
	Route::get('admin/roles', [RoleController::class, 'index'])->name('role.index');
	Route::get('admin/roles/create', [RoleController::class, 'create'])->name('role.create');
	Route::post('admin/roles', [RoleController::class, 'store'])->name('role.store');
	Route::get('admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
	Route::PATCH('admin/roles/{role}', [RoleController::class, 'update'])->name('role.update');
	Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
	// Permission Routes
	Route::resource('admin/permission','PermissionController');
	// Post Routes
	// Route::resource('admin/post','PostController');
	// Tag Routes
	// Route::resource('admin/tag','TagController');
	// Category Routes
	// Route::resource('admin/category','CategoryController');
	// Admin Auth Routes
	// Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	// Route::post('admin-login', 'Auth\LoginController@login');
});


