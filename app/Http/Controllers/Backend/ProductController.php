<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Developers;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Review;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProductController extends Controller
{

    public function add_review(Request $request){
        $product_id = $request->get('product_id');
        $content = isset($_POST['review']) ? $_POST['review'] : '';
        if($content!=''){
            $data = [
                'content'=>$content,
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->get('product_id'),
            ];
            DB::table('review')->insert($data);
            return redirect()->route('library.game',compact('product_id'))->with('success','Thêm Review Thành Công');
        }
        return redirect()->route('library.game')->with('error','Thêm Review Thất Bại');
    }
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
    public function edit(Request $request)
    {
        // Validation rules and custom messages
        $rules = [
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
        $customMessages = [
            'mimes' => 'Yêu Cầu Định Dạng png,jpg,jpeg',
            'max' => 'Kích Thước Tối Đa: 2048kb'
        ];
        $this->validate($request, $rules, $customMessages);
    
        // Process category data
        $category_str = $request->get('category_id');
        $category = explode('<>', $category_str);
        $categories_id = $category[0];
        $slug = $category[1];
    
        // Handle image upload
        $current_image = $request->get('imageName');
        $imageName = $current_image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        }
    
        // Find the product
        $product = Product::find($request->get('id'));
    
        // Process tags
        if ($request->has('tags')) {
            $tagNames = explode(',', $request->input('tags'));
            $tagNames = array_map('trim', $tagNames);
    
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (!empty($tagName)) {
                    $tag = Tags::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $product->tags()->sync($tagIds); // Update product tags
        } else {
            $product->tags()->sync([]); // If no tags are provided, detach all tags
        }
    
        // Data to be updated
        $data = [
            'name' => $request->get("name"),
            'sale' => $request->get("sale"),
            'price' => $request->get("price"),
            'description' => $request->get("description"),
            'categories_id' => $categories_id,
            'slug' => $slug,
            'updated_at' => now(),
            'image' => $imageName,
            'banner' => $request->get('banner'),
            'dev_id'=>$request->get('company'),
        ];
    
        // Update the product
        if ($request->hasFile('image')) {
            if ($image->storeAs('public/images', $imageName)) {
                // Update banner status and product data
                DB::table('products')->where('banner', true)->update(['banner' => false]);
                DB::table('products')->where('id', $request->get('id'))->update($data);
    
                // Remove old image
                if (!empty($current_image)) {
                    unlink(storage_path('app/public/images/' . $current_image));
                }
    
                return redirect()->route('product.index')->with('success', 'Sửa Sản Phẩm Thành Công');
            }
        } else {
            // Update banner status and product data
            DB::table('products')->where('banner', true)->update(['banner' => false]);
            DB::table('products')->where('id', $request->get('id'))->update($data);
    
            return redirect()->route('product.index')->with('success', 'Sửa Sản Phẩm Thành Công');
        }
    
        return redirect()->route('product.edit.form')->with('error', 'Sửa Sản Phẩm Thất Bại');
    }
    
    public function edit_form(Request $request)
    {
        $product_id = $request->query('product_id', 0);
        $products = Product::find($product_id); // Use find() to get a single product
        $product = Product::where('id',$product_id)->get();
        $category = Category::all(); // Use all() to get all categories
        $company = Developers::all();
        $tags = Tags::all(); // Use the Tag model to get all tags
    
        // Get the product's tag names and convert them to a comma-separated string
        $productTags = $products ? $products->tags()->pluck('name')->toArray() : [];
        $tagsString = implode(', ', $productTags);
    
        $template = "backend.dashboard.product.crud.edit";
        return view("backend.dashboard.layout", compact("template", 'category', 'product', 'tags', 'tagsString','company'));
    }
    public function product_detail(Request $request)
{
    $user_id = session('user_id');
    $qty = 0; // Variable to store the total quantity of products in the cart

    // Check if the 'cart' session exists
    $cart = session($user_id . "cart");
    if ($cart) {
        // Loop through the items in the cart and sum up the quantities
        foreach ($cart as $item) {
            $qty += $item['quantity'];
        }
    }

    $product_id = $request->get("product_id");
    $gallery = Gallery::where("product_id", $product_id)->get();
    $data = Product::where("id", $product_id)->get();
    $related = Product::where('id', $product_id)->value('categories_id');

    // Retrieve related products
    $data_related = Product::where('categories_id', $related)->paginate(5);

    // Retrieve reviews for the product
    $review = Review::where('product_id', $product_id)->get();
    $review_count = $review->count();

    $tags = Tags::all(); // Use the Tag model to get all tags
    
    // Get the product's tag names and convert them to a comma-separated string
    $products = Product::find($product_id); // Use find() to get a single product
    $productTags = $products ? $products->tags()->pluck('name')->toArray() : [];

    return view('backend.dashboard.product.product-details', compact('data', 'qty', 'gallery', 'data_related', 'review', 'review_count', 'tags','productTags'));
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
            'dev_id'=>$request->get('company'),
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
        $company = Developers::all();
        return view("backend.dashboard.layout",compact('company',"template",'category'));
    }
    public function index(){
        $products = Product::orderBy('created_at','DESC')->paginate(5);//lay ra 5 ban ghi
        $template = "backend.dashboard.product.index";
        return view("backend.dashboard.layout",compact("template","products"));
    }
}
