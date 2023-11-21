<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\User;
use App\Review;
use App\Order;
use App\Like;
use App\Address;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user =Auth::User();
        $products = Product::latest()->take(4)->get();

        return view("home",[
            "user"=>$user,
            "products"=> $products
        ]);
    }

    public function ownerPage(Request $request){
        $user =Auth::User();
        $product = new Product;

        $limit = $request->input('limit');
        $keyword = $request->input('keyword');
        $lower =0;
        $upper =999999999;
        if($limit == 1){
            $lower =0;
            $upper =1000;
        }elseif($limit ==2){
            $lower =1000;
            $upper =3000;
        }elseif($limit == 3){
            $lower =3000;
            $upper =5000;
        }elseif($limit == 4){
            $lower =5000;
            $upper =10000;
        }

        $products = $product->orderBy('id', 'desc');

        if (!empty($keyword)) {
            $products->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('introduction', 'LIKE', "%{$keyword}%");
            });
        }

        if ($limit !== 0) {
            $products->whereBetween('price', [$lower, $upper]);
        }
    
        $products = $products->get()->toArray();


        return view("owners/ownerpage",[
            "user"=> $user,
            "products"=> $products,
            "limit" =>$limit,
            "keyword" =>$keyword
        ]);
    }

    public function postProductComp(){
        $product = Product::latest()->first();

        return view("owners/post_product_comp",[
            'product' => $product,
        ]);
    }

    public function editProductComp(){
        $product = Product::latest('updated_at')->first();

        return view("owners/edit_product_comp",[
            'product' => $product,
        ]);
    }

    public function userList(Request $request){
        $user = new User;

        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $users = $user->where('name','LIKE',"%{$keyword}%")->get()->toArray();
            if(empty($users)) {
                $users = ("一致するユーザーがありません");
            }
        } else {
            $users = $user->all()->toArray();
        }

        return view("owners/user_list",[
            "users" => $users,
            "keyword" =>$keyword
        ]);
    }

    public function searchProduct(Request $request){
        $user = new User;
        $product = new Product;
        
        $limit = $request->input('limit');
        $keyword = $request->input('keyword');
        $lower =0;
        $upper =999999999;
        if($limit == 1){
            $lower =0;
            $upper =1000;
        }elseif($limit ==2){
            $lower =1000;
            $upper =3000;
        }elseif($limit == 3){
            $lower =3000;
            $upper =5000;
        }elseif($limit == 4){
            $lower =5000;
            $upper =10000;
        }

        $products = $product->orderBy('id', 'desc');

        if (!empty($keyword)) {
            $products->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('introduction', 'LIKE', "%{$keyword}%");
            });
        }

        if ($limit !== 0) {
            $products->whereBetween('price', [$lower, $upper]);
        }
    
        $products = $products->get()->toArray();

        return view("/search_product",[
            "user"=>$user,
            "products"=> $products,
            "limit" =>$limit,
            "keyword" =>$keyword
        ]);
    }

    public function showProduct(Product $product){
        $reviews = Review::with("user")->get();

        return view("/show_product",[
            "product"=>$product,
            "reviews"=>$reviews,
            
        ]);
    }

    public function postReviewConf(Product $product){

        return view("/post_review_conf",[
            "product"=>$product
        ]);
    }

    public function cart(){
        $user =Auth::User();
        $orders = Order::with(["user","product"])->where('user_id', $user->id)->where('status_id', 0)->orderBy('id', 'desc')->get();

        return view("/cart",[
            "orders"=>$orders
        ]);
    }

    public function emptyCart(){

        return view("/empty_cart",[
            
        ]);
    }

    public function address(){
        $user =Auth::User();
        $address = Address::with("user")->where('user_id', $user->id)->latest("id")->first();
        if(empty($address)){
            return redirect("/post_address");
        }

        return view("addresses/address",[
            "address"=> $address
        ]);
    }

    public function buyCartComp(Product $product){

        return view("/buy_cart_comp",[
            
        ]);
    }

    public function myPage(){
        $user =Auth::User();
        $likes = Like::with(["user","product"])->get();

        
        return view("users/mypage",[
            "user"=> $user,
            "likes"=>$likes
        ]);
    }

    public function deleteUserConf(User $user){

        return view("/delete_user_conf",[
            "user"=>$user
        ]);
    }

    public function orderList(){
        $user =Auth::User();
        $orders = Order::with(["user","product"])->where('user_id', $user->id)->where('status_id', 2)->orderBy('id', 'desc')->get();

        return view("users/order_list",[
            "orders"=>$orders
        ]);
    }
}
