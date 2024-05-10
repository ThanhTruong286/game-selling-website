<?php

namespace App\Http\Controllers\Backend;

use App\Models\Voucher;
use App\Models\VoucherType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function home(){
        $data = Voucher::paginate(5);
        $template = 'backend.dashboard.voucher.index';
        return view('backend.dashboard.layout',compact('data','template'));
    }
    public function add(Request $request){
        $type_id = $request->get('type');
        $type = DB::table('voucher_type')->where('id',$type_id)->get()->value('name');
        // dd($type_id);
        $data = [
            'content' => $request->get("content"),
            'value' => $request->get("value"),
            'type_id' => $type_id,
            'type' => $type,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
        // dd($data);
        //up file hinh vao storage, trong storage/public tao 1 file moi la images
        if(DB::table('voucher')->where('content',$request->get('content'))->exists()){
            return redirect()->route('voucher.add.form')->with('error','Thêm Voucher Thất Bại');
        }
        DB::table('voucher')->insert($data);
        return redirect()->route('voucher.crud')->with('success','Thêm Voucher Thành Công');
    }
    public function add_form(){
        $type = VoucherType::get();
        $template = "backend.dashboard.voucher.crud.add";
        return view("backend.dashboard.layout",compact("template",'type'));
    }
    public function delete(Request $request){
        $file = $request->get('file');
        $voucher_id = $request->get("voucher_id");
        if(DB::table("voucher")->where("id", $voucher_id)->exists()){  
            DB::table("voucher")->where("id", $voucher_id)->delete();
            //xoa file khoi storage
            unlink(storage_path('app/public/images/'.$file));
            return redirect()->route('category.crud')->with("success","Xóa Voucher Thành Công");
        }
        return redirect()->route('category.crud')->with("error","Xoá Voucher Thất Bại");
    }
    public function edit(Request $request){
        $rule = [
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $customMessages = [
            'mimes' => 'Yêu Cầu Định Dạng png,jpg,jpeg',
            'max' => 'Kích Thước Tối Đa: 2048kb'
        ];
        $this->validate($request, $rule, $customMessages);//kiem tra hop le file hinh anh
        $imageName = $request->get('imageName');
        $current_image = $request->get('imageName');
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = $request->file('image')->getClientOriginalName();
        }
        $data = [
            'id' => $request->get("id"),
            'content' => $request->get("content"),
            'value'=>$request->get('value'),
            'type'=>$request->get('type'),
            'updated_at'=>now(),
            'image' => $imageName,
        ];
        if($request->file('image') != null){
            if($image->storeAs('public/images', $imageName)){
                DB::table('voucher')->where('id',$request->get('id'))->update($data);
                unlink(storage_path('app/public/images/'.$current_image));
                return redirect()->route('voucher.crud')->with('success','Sửa Voucher Thành Công');
            }
        }
        else{
            DB::table('voucher')->where('id',$request->get('id'))->update($data);
            return redirect()->route('category.crud')->with('success','Sửa Voucher Thành Công');
        }
        
        return redirect()->route('voucher.edit.form')->with('error','Sửa Voucher Thất Bại');
    }
    public function edit_form(Request $request){
        $id = isset($_GET['voucher_id']) ? $_GET['voucher_id'] : 0;
        $voucher = Voucher::where("id",$id)->get();
        $template = "backend.dashboard.voucher.crud.edit";
        return view("backend.dashboard.layout",compact("template",'voucher'));
    }
    public function take_voucher(Request $request){
        $user_id = session()->get('user_id');
        $data = [
            'user_id'=>$user_id,
            'voucher_id'=>$request->get('id'),
        ];
        // dd($data);
        if(DB::table('voucher_user')->where('user_id',$user_id)->where('voucher_id',$request->get('id'))->exists()){
            return redirect()->route('home')->with('error','Thêm Voucher Thất Bại');
        }
        DB::table('voucher_user')->insert($data);
        return redirect()->route('home')->with('success','Thêm Voucher Thành Công');
    }
    public function voucher_view(){
        $data = DB::table('voucher')->get();
        return view('voucher',compact('data'));
    }
}
