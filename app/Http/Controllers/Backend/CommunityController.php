<?php

namespace App\Http\Controllers\Backend;

use App\Models\ListFriend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    public function delete_friend(Request $request){
        $friend_id = $request->get('friend_id');
        $userId = session()->get('user_id');
        if(ListFriend::where('owner_id',$userId)->where('friend_id',$friend_id)->exists()){
            ListFriend::where('owner_id',$userId)->where('friend_id',$friend_id)->delete();
            return redirect()->route('list.friend')->with('success','Xóa Bạn Thành Công'); 
        }
        return redirect()->route('list.friend')->with('error','Xóa Bạn Thành Công');
    }
    public function add_friend(Request $request){
        $userId = session()->get('user_id');
        $friend_id = $request->get('friend_id');
        $data = [
            'owner_id'=>$userId,
            'friend_id'=>$friend_id
        ];
        if(ListFriend::where('owner_id',$userId)->where('friend_id',$friend_id)->exists()){
            return redirect()->route('list.friend')->with('error','Đã Là Bạn Rồi');
        }
        if(ListFriend::insert($data)){
            return redirect()->route('list.friend')->with('success','Thêm Bạn Thành Công');
        }
        return redirect()->route('community.home')->with('error','Thêm Bạn Thất Bại');
    }
    public function list_friend()
    {
        // Get the user ID from the session
        $userId = session()->get('user_id');
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($userId . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($userId . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        // Join ListFriend with User to get the friends' details
        $friends = DB::table('list_friend')
                    ->join('users', 'list_friend.friend_id', '=', 'users.id')
                    ->where('list_friend.owner_id', $userId)
                    ->select('users.*')
                    ->paginate(5);
    
        // Check the data being fetched (optional for debugging)
        // dd($friends);
    
        // Pass the friends data to the view
        return view('backend.user.list_friend.index', compact('friends','qty'));
    }
    
    public function community(){
        $user_id = session()->get('user_id');
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $users = User::where('id', '!=', $user_id)->paginate(4);
        return view('backend.user.community',compact('users','qty'));
    }
}
