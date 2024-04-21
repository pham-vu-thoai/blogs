<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [HomeController::class, 'index']);

// Route cho trang đăng nhập
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


// Route cho trang đăng ký
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('forgotpassword', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgotpassword', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [DashboardController::class, 'showAdminProfile'])->name('profile');
    // Route::post('changePassword', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::post('changePassword', [AuthController::class, 'changePassword_Admin'])->name('changePassword');
    // Role routes
    Route::resource('role', RoleController::class);

    // Permission routes
    Route::resource('permission', PermissionController::class);
    // Role//
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::PATCH('/roles/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    // Permission
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::PATCH('/permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    // Post//
    Route::get('/post', [PostController::class, 'index',])->name('post');
    Route::post('post/upload', [PostController::class, 'uploadImage'])->name('post.upload');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/show/{slug}', [PostController::class, 'show',])->name('post.show');
    //Category//
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::PATCH('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    // Tags//
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::PATCH('/tag/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
    //User//
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::PATCH('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
})->middleware("auth");
Route::group(['namespace' => 'User'], function () {
    Route::get('/', [UserHomeController::class, 'index']);
    Route::get('/post/{slug}', [UserPostController::class, 'show'])->name('user.post');
    Route::get('/post/tag/{tag}', [UserHomeController::class, 'tag'])->name('tag');
    Route::get('/post/category/{category}', [UserHomeController::class, 'category'])->name('category');

    Route::post('getPosts', [UserPostController::class, 'getAllPost']);
    // web.php
    Route::post('/posts/save-like', [UserPostController::class, 'saveLike'])->name('posts.save-like');
    Route::post('/posts/save-dislike', [UserPostController::class, 'savedisLike'])->name('posts.save-dislike');

    Route::get('/search', [UserHomeController::class, 'search'])->name('search');
});

// Auth::routes();

Route::get('/home', [UserHomeController::class, 'index'])->name('index');
