<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){

    }
    public function index(){
        $users = User::paginate(5);//lay ra 5 ban ghi
        $template = 'backend.dashboard.user.index';
        return view('backend.dashboard.layout',compact('template','users'));
    }
}
