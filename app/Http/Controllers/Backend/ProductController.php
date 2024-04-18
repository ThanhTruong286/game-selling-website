<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function product_detail(Request $request){
        $product_id = $request->get("product_id");
        $data = Product::where("id",$product_id)->get();
        return view('backend.dashboard.product.product-details',compact('data'));
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
            'image' => $request->image->getClientOriginalName(),//lay ra ten cua file hinh 
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
        $template = "backend.dashboard.product.add";
        return view("backend.dashboard.layout",compact("template",'category'));
    }
    public function index(){
        $products = Product::paginate(5);//lay ra 5 ban ghi
        $template = "backend.dashboard.product.index";
        return view("backend.dashboard.layout",compact("template","products"));
    }
}
