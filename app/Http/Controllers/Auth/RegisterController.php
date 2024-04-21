<?php

namespace App\Http\Controllers\Auth;

use App\Models\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   

     public function register(Request $request)
     {
         // Validate dữ liệu nhập vào
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email|unique:users,email|unique:admins,email', // Kiểm tra trùng lặp trong cả bảng users và admins
             'password' => 'required|min:8',
             'phone' => 'required|numeric',
         ]);
     
         // Kiểm tra xem có lỗi không
         if ($validator->fails()) {
             return redirect()->route('register')->withErrors($validator)->withInput();
         }
     
         // Tạo một user mới
         User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'phone' => $request->phone,
         ]);
     
         // Chuyển hướng người dùng đến trang đăng nhập và thông báo thành công
         return redirect()->route('login')->with('success', 'Registration successful. Please login.');
     }
    
}
