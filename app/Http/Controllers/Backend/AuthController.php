<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function index(Request $request){
        if(Auth::check()){
            return redirect()->route('home')->with('error','Bạn Đã Đăng Nhập');
        }
        elseif(!Auth::check()){
            return view('backend.auth.login');
        }
    }
    public function returnViewSignup(Request $request){
        return view('backend.auth.signup');
    }
    public function signup(Request $request){//su dung auth request de format required
        $email = $request->input('email');
        $check_email = DB::table('users')->where('email',$email)->value('email');//chi tra ve cot email trong user duoc chon
        $phone = $request->input('phone');
        $check_phone = DB::table('users')->where('phone',$phone)->value('phone');
        //check xem email da ton tai hay chua
        if($email == $check_email )//doi chieu email vua input va toan bo email trong table users
        {
            return redirect()->route('signup.form')->with('error','Email Đã Được Đăng Ký !!!');
        }
        //check xem sdt da ton tai hay chua
        else if($check_phone == $phone) {
            return redirect()->route('signup.form')->with('error','Số Điện Thoại Đã Được Đăng Ký !!!');
        }
        //thoa dieu kien de tao account
        else{
            $data = [
                'name' => $request->input('name'),
                'phone' => $phone,
                'email' => $email,
                'password' => Hash::make($request->input('password')),
                'roles' => 1
            ];
            DB::table('users')->insert($data);
            return redirect()->route('signin.form')->with('success','Đăng Ký Thành Công !!!');
        }
    }
    public function login(Request $request){//su dung auth request de format 
        // //luu tru thong tin vua nhap tren form
        $credentials = [
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        ];
        //check thong tin
        if(Auth::attempt($credentials)){
            $user_name = DB::table('users')->where('email', $request->input('email'))->value('name');
            // dd($user_name);
            $request->session()->regenerate();
            return redirect()->route('home',['user_name' => $user_name])->with('success','Đăng Nhập Thành Công');
        }
        else {
            return redirect()->route('home')->with('error','Đăng Nhập Thất Bại');
        }

    }
    public function reset_password(Request $request){ 
        $email = $request->get('email');//chi lay gia tri email trong array bao gom _token va email tu request
        if($email != null){
            return view('backend.auth.reset_password',compact('email'))->with('success','Gửi Yêu Cầu Thành Công !!!');
        }
        else{
            $email = '';
            return view('backend.auth.reset_password',compact('email'))->with('error','Gửi Yêu Cầu Thất Bại !!!');
        }
    }
    public function make_new_password(Request $request){
        $email = $request->get('email');//chi lay gia tri email trong array bao gom _token va email tu request
        $password = $request->input('password');
        $confirm = $request->input('confirm');
        if($password == $confirm && $password != null){
            dd($email);
            DB::table('users')->where('email', $email)->update(['password'=> Hash::make($password)]);
            return redirect()->route('signin.form')->with('success','Đổi Mật Khẩu Thành Công !!!');
        }
        return view('backend.auth.new_password',compact('email'));
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success','Đăng xuất thành công');//gui session logout-success len trang auth.index
    }
}