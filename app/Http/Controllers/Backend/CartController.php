<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_to_library(Request $request){
        $product_id = $request->get("product_id");
        $user_id = Auth::user()->id;
        $data = [
            "product_id"=> $product_id,
            'user_id'=> $user_id,
        ];
        // dd($data);
        if(DB::table('library')->where('product_id', $product_id)->where('user_id',$user_id)->exists()){
            return redirect()->back()->with('error','Đã Có Sản Phẩm Trong Thư Viện');
        }
        DB::table("library")->insert($data);
        return redirect()->route('thanks')->with("success","Mua Sản Phẩm Thành Công");
    }
    public function thanks()
    {
        return view('thanks');
    }
    public function online_checkout(Request $request)
    {
        if (isset($_POST['payUrl'])) {

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $_POST['amount'];

            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/thanks";
            $ipnUrl = "http://127.0.0.1:8000/thanks";
            $extraData = "";

            $serectkey = $secretKey;

            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            // dd($jsonResult);
            return redirect()->to($jsonResult['payUrl']);
        }
        return redirect()->route('home')->with('error','Giao Dịch Thất Bại');
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//IMPORTANT
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        if (!$result) {
            // print curl_errno($ch) .': '. curl_error($ch);
            dd(curl_errno($ch) . ':' . curl_error($ch));
        }
        // dd($result);
        return $result;
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
        $template = 'backend.cart.payment';
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
        return view('backend.cart.index', compact('cart', 'template', 'totalPrice', 'totalProduct', 'user_image'));
    }
}
