<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SebastianBergmann\Type\VoidType;

class AuthController extends Controller
{
    public function confirm_email(Request $request){
        //tao bien data luu tru du lieu user moi
        $data = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),//hash password bang thu vien Hash
            'roles' => 1//role luon luon bang 1(khach hang)
        ];

            DB::table('users')->insert($data);
            return redirect()->route('signin.form')->with('success','Tạo Tài Khoản Thành Công');
    }
    public function showProfile(Request $request){
        // $user = User::where("email", $request->email)->first();cach khong toi uu 
        $user = Auth::user();
        return view("backend.user.profile",compact("user"));
    }
    
    public function index(Request $request){
        //check xem user da dang nhap hay chua
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
    public function signup(Request $request){
        $email = $request->input('email');//lay du lieu email
        $check_email = DB::table('users')->where('email',$email)->value('email');//chi tra ve cot email trong user duoc chon
        $phone = $request->input('phone');//lay du lieu so dien thoai
        $check_phone = DB::table('users')->where('phone',$phone)->value('phone');
        $password = $request->input('password');//lay du lieu password
        $name = $request->input('name');
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
            return view('backend.auth.waiting.waiting_signup',compact('email','phone','name','password'));
        }
    }
    public function login(Request $request){
        // //luu tru thong tin vua nhap tren form
        $credentials = [
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        ];
        //check thong tin
        if(Auth::attempt($credentials)){
            $user_name = DB::table('users')->where('email', $request->input('email'))->value('name');
            $user_id = DB::table('users')->where('email', $request->input('email'))->value('id');
            $user = DB::table('users')->where('email', $request->input('email'))->get();
            // dd($user_name);
            $request->session()->regenerate();
            $request->session()->put('user_id',$user_id);
            $request->session()->put('user',$user);
            // dd(session()->all());
            return redirect()->route('home')->with('success','Đăng Nhập Thành Công');
        }
        else {
            return redirect()->route('signin.form')->with('error','Đăng Nhập Thất Bại, Lỗi Tài Khoản Hoặc Mật Khẩu');
        }

    }
    public function send_email_reset(Request $request){ 
        $email = $request->get('email');
        //kiem tra xem email da duoc dung de dang ky hay chua
        if(DB::table('users')->where('email', $email)->count() == 0){
            return redirect()->route('reset_password_view')->with('error','Email Chưa Từng Dùng Để Đăng Ký');
        }
        return view('backend.auth.waiting.waiting_reset_password',compact('email'));
    }
    public function reset_password_view(Request $request){
        $email = $request->get('email');
        return view('backend.auth.send_reset_mail',compact('email'));
    }
    public function returnResetPasswordView(Request $request){
        $email = $request->get('email');
        return view('backend.auth.new_password',compact('email'));
    }
    public function make_new_password(Request $request){
        $password = $request->get('password');
        $confirm = $request->get('confirm');
        if($password != null){
            $email = $request->get('email');//chi lay gia tri email trong array bao gom _token va email tu request

            if($password == $confirm){
                // dd($email);
                DB::table('users')->where('email', $email)->update(['password'=> Hash::make($password)]);
                return redirect()->route('signin.form')->with('success','Đổi Mật Khẩu Thành Công !!!');
            }
            else{
                return redirect()->route('signin.form')->with('error','Mật Khẩu Không Trùng Khớp !!!');
            }
        }
    }
    public function logout(Request $request){
        $user_id = session()->get('user_id');
        $cart = session()->get($user_id . 'cart');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        session()->put($user_id . 'cart',$cart);
        return redirect()->route('home')->with('success','Đăng xuất thành công');//gui session logout-success len trang auth.index
    }
}