<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Models\WishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function delete_wishlist(Request $request){
        $product_id = $request->get('product_id');
        $user_id = session()->get('user_id');
        if(DB::table('wishlist')->where('user_id',$user_id)->where('product_id',$product_id)->exists()){
            DB::table('wishlist')->where('user_id',$user_id)->where('product_id',$product_id)->delete();
            return redirect()->route('wishlist')->with('success','Xóa Sản Phẩm Thành Công');
        }
        return redirect()->route('wishlist')->with('error','Xóa Sản Phẩm Thất Bại');
    }
    public function add_to_wishlist(Request $request){
        $product_id = $request->get('product_id');
        $user_id = session()->get('user_id');
        $data = [
            'user_id'=>$user_id,
            'product_id'=>$product_id
        ];
        if(DB::table('wishlist')->where('user_id',$user_id)->where('product_id',$product_id)->exists()){
            return redirect()->route('wishlist')->with('error','Đã Có Sản Phẩm Trong Wishlist');
        }
        if(DB::table('wishlist')->insert($data)){
            return redirect()->route('wishlist')->with('success','Thêm Vào Wishlist Thành Công');
        }
        return redirect()->route('wishlist')->with('error','Thêm Vào Wishlist Thất Bại');
    }
    public function wishlist(){
        $user_id = session()->get('user_id');
        $data = WishList::where('user_id',$user_id)->paginate(4);
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $carts = session($user_id . "cart");
        if($carts){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $carts){
                $qty += $carts['quantity'];
            }
        }
        return view('backend.wishlist.index',compact('data','qty'));
    }
    public function use_voucher(Request $request){
        $user_id = session()->get('user_id');
        $cart = session()->get($user_id . 'cart');
        $totalPrice = 0;
        $old_price = 0;
        if ($cart) {
            foreach ($cart as $key => $value) {
                $totalPrice += $value['price'];
                $old_price += $value['price'];
            }
        }
        $totalProduct = 0;
        if ($cart) {
            $totalProduct = count($cart);
        }
        $voucher = null;
        $voucher_value = null;
        $voucher_value_price = null;
        $voucher_type = null;
        $voucher_str = isset($_POST['voucher']) ? $_POST['voucher'] : '';
        if($voucher_str != '0'){
            $voucher = explode('<>',$voucher_str);
            $voucher_type = $voucher[1];
            $voucher_value = $voucher[2];
            switch($voucher_type){
                case 'VND':
                    $voucher_value = $voucher_value * 1000;
                    $totalPrice = $totalPrice - $voucher_value;
                    break;
                case '%':
                    $voucher_value_price = $totalPrice * $voucher_value / 100;
                    $totalPrice = $old_price - $voucher_value_price;
                    break;
                default:
                    break;
            }
        }
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $carts = session($user_id . "cart");
        if($carts){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $carts){
                $qty += $carts['quantity'];
            }
        }
        return view('backend.cart.final_cart', compact('cart', 'totalPrice', 'totalProduct','voucher','old_price','voucher_value','voucher_type','voucher_value_price','qty'));
    }
    public function add_to_library(Request $request){
        $voucher = isset($_GET['voucher']) ? $_GET['voucher'] : '';
        if(isset($_GET['payUrl'])){
            $user_id = Auth::user()->id;
            $cart = session()->get($user_id . 'cart');
    
            foreach($cart as $key => $value){
                $data[] = [
                    "product_id" => $value['id'],
                    'user_id'=> $user_id,
                ];
                if(DB::table('library')->where('product_id', $value['id'])->where('user_id',$user_id)->exists()){
                    return redirect()->route('show.cart')->with('error','Đã Có Sản Phẩm ' .$value['name']. ' Trong Thư Viện');
                }
            }
            DB::table("library")->insert($data);
            if($voucher != null){
                $voucher_id = DB::table('voucher')->where('content',$voucher)->get()->value('id');
     
                DB::table('voucher_user')->where('user_id',$user_id)->where('voucher_id',$voucher_id)->delete();
            }
            session()->forget($user_id . 'cart');
    
            return redirect()->route('thanks')->with("success","Mua Sản Phẩm Thành Công");
        }
        return redirect()->route('home')->with("error","Mua Sản Thất Bại");
    }
    public function thanks()
    {
        return view('thanks');
    }

    public function delete($product_id)
    {
        $user_id = session()->get('user_id');
        $cart = session()->get($user_id . 'cart');

        if (!$cart) {
            return redirect()->route('show.cart')->with('error', 'Giỏ Hàng Không Tồn Tại');
        }
        foreach ($cart as $key => $value) {
            if ($value['id'] == $product_id) {
                // dd($cart);
                unset($cart[$key]);//xoa phan tu thu key trong mang session cart
                session()->put($user_id . 'cart', $cart);//day lai du lieu session user id cart bang cart moi
                return redirect()->route('show.cart')->with('success', 'Xoá Sản Phẩm Thành Công');
            }
        }
        return redirect()->route('show.cart')->with('error', 'Xoá Sản Phẩm Thất Bại');
    }
    public function updateCart(Request $request)
    {
        $user_id = session()->get('user_id');
        if ($request->id && $request->quantity) {
            $cart = session()->get($user_id . 'cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put($user_id . 'cart', $cart);
            session()->flash('success', 'Product added to cart.');
        }
    }
    public function add($product_id)
    {
        $user_id = session()->get('user_id');
        $product = Product::find($product_id);
        $cart = session()->get($user_id . 'cart');
        if (!$cart) {
            $cart = [
                $product_id => [
                    'id' => $product_id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->image,
                    'description' => $product->description,
                ]
            ];
            session()->put($user_id . 'cart', $cart);
            return redirect()->route('show.cart')->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng');
        }
        if (isset($cart[$product_id])) {

            // $cart[$product_id]['quantity']++;

            // session()->put('cart', $cart);

            return redirect()->route('show.cart')->with('error', 'Sản Phẩm Đã Có Trong Giỏ Hàng');
        }

        $cart[$product_id] = [
            'id' => $product_id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->image,
            'description' => $product->description
        ];
        session()->put($user_id . 'cart', $cart);
        return redirect()->route('show.cart')->with('success', 'Đã Thêm Sản Phẩm Vào Giỏ Hàng');
    }
    public function show_cart()
    {
        $user = session()->get('user');
        $user_id = session()->get('user_id');
        $result = json_decode($user, true);//Để conver giá trị chỉ định thành định dạng JSON,
        foreach ($result as $key => $value) {
            $provine = $value['province'];
            $user_image = $value['image'];
        }
        $cart = session()->get($user_id . 'cart');
        $totalPrice = 0;
        // dd($cart);
        if ($cart) {
            foreach ($cart as $key => $value) {
                $totalPrice += $value['price'];
            }
        }
        $totalProduct = 0;
        if ($cart) {
            $totalProduct = count($cart);
        }
        // dd($cart);
        $voucher = VoucherUser::where('user_id',session()->get('user_id'))->get();
        $qty = 0;//bien luu tru tong so luong san pham
        //kiem tra su ton tai cua session 'cart'
        $carts = session($user_id . "cart");
        if($carts){
            //tao vong lap va cong don quantity ben trong session('cart')
            foreach(session($user_id . 'cart') as $carts){
                $qty += $carts['quantity'];
            }
        }
        return view('backend.cart.index', compact('cart', 'totalPrice', 'totalProduct', 'user_image','voucher','qty'));
    }
}
