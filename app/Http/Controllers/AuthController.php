<?php

namespace App\Http\Controllers;

use App\Models\admin\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\user\User;

class AuthController extends Controller
{
    // Hiển thị trang đăng nhập
    public function showLogin()
    {
        return view('auth.login');
    }

    // Hiển thị trang đăng ký
    public function showRegister()
    {
        return view('auth.register');
    }

    // Hiển thị trang quên mật khẩu
    public function showForgotPassword()
    {
        return view('auth.forgot');
    }

    // Xử lý yêu cầu đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng user đến trang chính của user
            return redirect()->intended('/');
        }

        // Đăng nhập thất bại, chuyển hướng trở lại trang đăng nhập với thông báo lỗi và dữ liệu nhập lại
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/');
    }

   
   

    // Xử lý yêu cầu thay đổi mật khẩu
    public function changePassword_User(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
    
        // Lấy người dùng hiện tại
        $user = Auth::user();
    
        // Kiểm tra mật khẩu hiện tại có đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác'])->withInput();
        }
    
        // Cập nhật mật khẩu mới cho người dùng hiện tại
        User::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
    
        // Chuyển hướng về trang profile và hiển thị thông báo thành công
        return redirect()->route('profile')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
    public function changePassword_Admin(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);
    
        // Lấy người dùng hiện tại
        $user = Auth::user();
    
        // Kiểm tra mật khẩu hiện tại có đúng không
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác'])->withInput();
        }
    
        // Cập nhật mật khẩu mới cho người dùng hiện tại
        admin::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
    
        // Chuyển hướng về trang profile và hiển thị thông báo thành công
        return redirect()->route('profile')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
