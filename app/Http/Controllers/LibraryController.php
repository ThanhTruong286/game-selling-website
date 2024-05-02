<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function delete_game(Request $request){
        $user_id = session()->get("user_id");
        $product_id = $request->get("product_id");
        if(DB::table('library')->where('user_id',$user_id)->where('product_id',$product_id)->exists()){
            DB::table('library')->where('user_id',$user_id)->where('product_id',$product_id)->delete();
            return redirect()->route('profile')->with('success','Xóa Thành Công');
        }
        return redirect()->route('profile')->with('error','Xóa Thất Bại');
        
    }
    public function library_game(Request $request){
        $product_id = $request->get("product_id");
        $data = Product::where("id",$product_id)->get();
        $user_id = session()->get('user_id');
        $product_id_user = DB::table('library')->where('user_id',$user_id)->get('product_id');
        foreach($product_id_user as $value){
            $product[] = DB::table('products')->where('id',$value->product_id)->get();
        }
        return view('backend.library.index',['product'=>$product,'data'=>$data]);
    }
    public function user_library(Request $request){
        $user_id = $request->get('user_id');
        $product_id = DB::table('library')->where('user_id',$user_id)->get('product_id');
        $product[] = null;
        foreach($product_id as $value){
            $product[] = DB::table('products')->where('id',$value->product_id)->get();
        }
        $data = null;
        return view('backend.library.index',['product'=>$product,'data'=>$data]);
    }
}
