<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function add_gallery(Request $request){
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $image = null;
        $imageName =null;
        if($request->file('gl1')){
            $imageName = $request->file('gl1')->getClientOriginalName();
            $image = $request->file('gl1');
        }

        $rule = [
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $customMessages = [
            'mimes' => 'Yêu Cầu Định Dạng png,jpg,jpeg',
            'max' => 'Kích Thước Tối Đa: 2048kb'
        ];
        $this->validate($request, $rule, $customMessages);//kiem tra hop le file hinh anh
        $data = [
            'image'=>$imageName,
            'name'=>$imageName,
            'product_id'=>$product_id,
        ];
        if($image != null){
            if($image->storeAs('public/images', $imageName)){
                if(DB::table('gallery')->where('product_id',$product_id)->count() < 5){
                    DB::table('gallery')->insert($data);
                    return redirect()->route('add.gallery.form',compact('product_id'))->with('success','Thêm Gallery Thành Công');
                }
                return redirect()->route('add.gallery.form',compact('product_id'))->with('error','Gallery Cho Sản Phẩm Này Đã  Dạt Giới Hạn');
                
            }}
        return redirect()->route('add.gallery.form',compact('product_id'))->with('error','Thêm Gallery Thất Bại');
    }
    public function add_gallery_form(Request $request){
        $product_id = $request->get('product_id');
        $data = Product::where('id',$product_id)->get();
        $gallery = DB::table('gallery')->where('product_id',$product_id)->get();
        $template = 'backend.dashboard.product.crud.add_gallery';
        return view('backend.dashboard.layout',compact('template','data','gallery'));
    }
    public function banner(Request $request){

    }
    public function delete(Request $request){
        $file = $request->get('file');
        $product_id = $request->get("product_id");
        if(DB::table("products")->where("id", $product_id)->exists()){  
            DB::table("products")->where("id", $product_id)->delete();
            //xoa file khoi storage
            unlink(storage_path('app/public/images/'.$file));
            return redirect()->route('product.index')->with("success","Xóa Sản Phẩm Thành Công");
        }
        return redirect()->route('product.index')->with("error","Xoá Sản Phẩm Thất Bại");
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
        $category_str  = $request->get('category_id');//lay du lieu tu form
        $category = explode('<>', $category_str);//cat du lieu qua chuoi <>, truong hop nay se tao dc 2 chuoi id va name
        $categories_id = $category[0];//phan tu thu 0 chinh la id category
        $slug = $category[1];//phan tu thu 1 chinh la name category, dung de tao slug
        //tao bien data luu tru du lieu cua product can dc insert
        $current_image = $request->get('imageName');
        $imageName = $request->get('imageName');
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = $request->file('image')->getClientOriginalName();
        }
        $data = [
            'id' => $request->get("id"),
            'name' => $request->get("name"),
            'sale' => $request->get("sale"),
            'price' => $request->get("price"),
            'description' => $request->get("description"),
            'categories_id' => $categories_id,
            'slug'=>$slug,
            'updated_at'=>now(),
            
            'image' => $imageName,
            'banner' => $request->get('banner'),
        ];
        if($request->file('image') != null){
            // dd($imageName);
            if($image->storeAs('public/images', $imageName)){
                DB::table('products')->where('banner',true)->update(['banner'=>false]);
                DB::table('products')->where('id',$request->get('id'))->update($data);
                unlink(storage_path('app/public/images/'.$current_image));
                return redirect()->route('product.index')->with('success','Sửa Sản Phẩm Thành Công');
            }
        }
        else{
            DB::table('products')->where('banner',true)->update(['banner'=>false]);
            DB::table('products')->where('id',$request->get('id'))->update($data);
            return redirect()->route('product.index')->with('success','Sửa Sản Phẩm Thành Công');
        }
        
        return redirect()->route('product.edit.form')->with('error','Sửa Sản Phẩm Thất Bại');
    }
    public function edit_form(Request $request){
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 0;
        $product = Product::where("id",$product_id)->get();
        $category = Category::get();//lay toan bo du lieu category
        $template = "backend.dashboard.product.crud.edit";
        return view("backend.dashboard.layout",compact("template",'category','product'));
    }
    public function product_detail(Request $request){
        $user_id = session('user_id');
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $cart = session($user_id . "cart");
        if($cart){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $cart){
                $qty += $cart['quantity'];
            }
        }
        $product_id = $request->get("product_id");
        $gallery = Gallery::where("product_id",$product_id)->get();
        $data = Product::where("id",$product_id)->get();
        $related = Product::where('id',$product_id)->value('categories_id');
        // dd($related);
        $data_related = Product::where('categories_id',$related)->paginate(5);
        return view('backend.dashboard.product.product-details',compact('data','qty','gallery','data_related'));
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
        $category_str  = $request->get('category_id');//lay du lieu tu form
        $category = explode('<>', $category_str);//cat du lieu qua chuoi <>, truong hop nay se tao dc 2 chuoi id va name
        $categories_id = $category[0];//phan tu thu 0 chinh la id category
        $slug = $category[1];//phan tu thu 1 chinh la name category, dung de tao slug
        //tao bien data luu tru du lieu cua product can dc insert
        $data = [
            'name' => $request->get("name"),
            'price' => $request->get("price"),
            'description' => $request->get("description"),
            'categories_id' => $categories_id,
            'slug' => strtolower($slug),
            'created_at'=>now(),
            'updated_at'=>now(),
            'total_play_time'=>0,
            'sale'=>0,
            'old_price'=>$request->get('price'),
            'image' => $request->image->getClientOriginalName(),//lay ra ten cua file hinh 
            'banner'=>false,
        ];
        $file = $request->file('image');//lay du lieu file hinh
        //up file hinh vao storage, trong storage/public tao 1 file moi la images
        if($file->storeAs('public/images', $file->getClientOriginalName())){
            DB::table('products')->insert($data);
            return redirect()->route('product.index')->with('success','Thêm Sản Phẩm Thành Công');
        }
        return redirect()->route('product.add.form')->with('error','Thêm Sản Phẩm Thất Bại');
    }
    public function add_form(){
        $category = Category::get();//lay toan bo du lieu category
        $template = "backend.dashboard.product.crud.add";
        return view("backend.dashboard.layout",compact("template",'category'));
    }
    public function index(){
        $products = Product::paginate(5);//lay ra 5 ban ghi
        $template = "backend.dashboard.product.index";
        return view("backend.dashboard.layout",compact("template","products"));
    }
}
