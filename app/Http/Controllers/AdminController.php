<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // đăng nhập
    public function login() {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {
        /*
        $email =  $_POST['email'];
        $password =  $_POST['password'];

        // Tìm trong CSDL
        $sql = "SELECT * FROM user WHERE email = $email AND password = $password;
        $ketqua = $sql->query();

        if ($ketqua) {
         // tồn tại user thỏa mãn

         => lưu thông tin đăng nhập vào session , cookie

         => tragn admin
        } else {
            // không tồn tại => đăng nhập
        }*/

        //validate dữ liệu
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]); // validate false => tạo ra biến $errors để lưu toàn thông tin bị lỗi cho từng trường

        // validate thành công

        $dataLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $checkLogin = Auth::attempt($dataLogin, $request->has('remember')); // true/false

        // kiểm tra xem có đăng nhập thành công với email và password đã nhập hay không
        if ($checkLogin) {
            return redirect()->route('admin.product.index');
        }

        return redirect()->back()->with('msg', 'Email hoặc password không đúng');
    }

    public function logout()
    {
        // xử lý đăng xuất : xóa session và cookie
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
