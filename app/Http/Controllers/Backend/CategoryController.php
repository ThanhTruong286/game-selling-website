<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function most_play(Request $request){
        $template = "backend.category.most_play";
        $title = "Most Played";
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session("cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session('cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product = Product::where('total_play_time','>=',100000)->orderBy('total_play_time','desc')->paginate(8);
        $categories = DB::table("categories")->get();
        $count = count($product);
        return view("backend.category.layout",compact("product",'categories','qty','count','template','title'));
    }
    public function delete(Request $request){
        $file = $request->get('file');
        $categories_id = $request->get("categories_id");
        if(DB::table("categories")->where("id", $categories_id)->exists()){  
            DB::table("categories")->where("id", $categories_id)->delete();
            //xoa file khoi storage
            unlink(storage_path('app/public/images/'.$file));
            return redirect()->route('category.crud')->with("success","Xóa Danh Mục Thành Công");
        }
        return redirect()->route('category.crud')->with("error","Xoá Danh Mục Thất Bại");
    }
    public function edit(Request $request){
        $imageName = $request->get('imageName');
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = $request->file('image')->getClientOriginalName();
        }
        $data = [
            'id' => $request->get("id"),
            'name' => $request->get("name"),
            'slug'=>strtolower($request->get('name')),
            'updated_at'=>now(),
            'image' => $imageName,
        ];
        if($request->file('image') != null){
            if($image->storeAs('public/images', $imageName)){
                DB::table('categories')->where('id',$request->get('id'))->update($data);
                return redirect()->route('category.crud')->with('success','Sửa Danh Mục Thành Công');
            }
        }
        else{
            DB::table('categories')->where('id',$request->get('id'))->update($data);
            return redirect()->route('category.crud')->with('success','Sửa Danh Mục Thành Công');
        }
        
        return redirect()->route('category.edit.form')->with('error','Sửa Danh Mục Thất Bại');
    }
    public function edit_form(Request $request){
        $id = isset($_GET['categories_id']) ? $_GET['categories_id'] : 0;
        $category = Category::where("id",$id)->get();
        $template = "backend.dashboard.category.crud.edit";
        return view("backend.dashboard.layout",compact("template",'category'));
    }
    public function add(Request $request){
        $rule = [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ];
        $customMessages = [
            'mimes' => 'Yêu Cầu Định Dạng png,jpg,jpeg',
            'max' => 'Kích Thước Tối Đa: 2048kb'
        ];
        $this->validate($request, $rule, $customMessages);//kiem tra hop le file hinh anh

        $data = [
            'name' => $request->get("name"),
            'slug' => strtolower($request->get("name")),
            'created_at'=>now(),
            'updated_at'=>now(),
            'image' => $request->image->getClientOriginalName(),//lay ra ten cua file hinh 
        ];
        $file = $request->file('image');//lay du lieu file hinh
        //up file hinh vao storage, trong storage/public tao 1 file moi la images
        if($file->storeAs('public/images', $file->getClientOriginalName())){
            DB::table('categories')->insert($data);
            return redirect()->route('category.crud')->with('success','Thêm Danh Mục Thành Công');
        }
        return redirect()->route('category.add.form')->with('error','Thêm Danh Mục Thất Bại');
    }
    public function add_form(){
        $template = "backend.dashboard.category.crud.add";
        return view("backend.dashboard.layout",compact("template"));
    }
    public function home(){
        $categories = Category::paginate(5);//lay ra 5 ban ghi
        $template = "backend.dashboard.category.index";
        return view("backend.dashboard.layout",compact("template","categories"));
    }
    public function trending(Request $request){
        $template = "backend.category.trending";
        $title = "Trending Game";
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session("cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session('cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product = Product::whereRaw("DATEDIFF('" . now() . "',created_at) <= 7")->where('total_play_time','>=',1000)->orderBy("created_at","asc")->paginate(4);
        $categories = DB::table("categories")->get();
        $count = count($product);
        return view("backend.category.layout",compact("product",'categories','qty','count','template','title'));
    }
    public function index(Request $request){
        $template = "backend.category.index";
        $user_id = session()->get("user_id");
        $title = $request->get('name');
        if($title == null){
            $title = 'Our Shop';
        }

        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product = Product::where('slug','like','%' . $request->get('name') . '%')->paginate(8);
        $categories = DB::table("categories")->get();
        $count = count($product);
        return view("backend.category.layout",compact("product",'categories','qty','count','template','title'));
    }
}
