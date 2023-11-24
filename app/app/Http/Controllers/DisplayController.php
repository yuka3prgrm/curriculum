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
use Carbon\Carbon;

class DisplayController extends Controller
{
    public function index(Request $request){
        if(Auth::check()){
            if(Auth::user()->authority_flg == 0){
                return redirect ("/ownerpage");
            }
        }
        $user =Auth::User();
        $products = Product::latest()->take(4)->orderBy('id', 'desc')->get();
        $like_model = new Like;


        return view("home",[
            "user"=>$user,
            "products"=> $products,
            'like_model'=>$like_model,
        ]);
    }

    public function ownerPage(Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
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

        $products = $product->where('del_flg', 0)->orderBy('id', 'desc');

        if (!empty($keyword)) {
            $products->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('introduction', 'LIKE', "%{$keyword}%");
            });
        }

        if ($limit !== 0) {
            $products->whereBetween('price', [$lower, $upper]);
        }
    
        $products = $products->paginate(8);


        return view("owners/ownerpage",[
            
            "user"=> $user,
            "products"=> $products,
            "limit" =>$limit,
            "keyword" =>$keyword
        ]);
    }

    public function postProductComp(){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $product = Product::latest()->first();

        return view("owners/post_product_comp",[
            'product' => $product,
        ]);
    }

    public function editProductComp(){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $product = Product::latest('updated_at')->first();
        if($product->hidden_flg == 0){
            $status ="商品公開中";
        }else {
            $status ="公開停止中";
        }

        return view("owners/edit_product_comp",[
            'product' => $product,
            'status' => $status
        ]);
    }

    public function userList(Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $users = User::query();

        $sort = $request->input('sort');
        $keyword = $request->input('keyword');
        if($sort == 1){
            $users =$users->orderBy('id', 'desc');
        }elseif($sort ==2){
            $users =$users->orderBy('updated_at', 'asc');
        }elseif($sort ==3){
            $users =$users->orderBy('updated_at', 'desc');
        }elseif($sort ==4){
            $users =$users->orderBy('del_flg', 'asc');
        }elseif($sort ==5){
            $users =$users->orderBy('del_flg', 'desc');
        }

        if(!empty($keyword)) {
            $users->where('name','LIKE',"%{$keyword}%");
        } 
        if(empty($users)) {
            $users = ("一致するユーザーがありません");
        }
        $users = $users->paginate(10);

        return view("owners/user_list",[
            "users" => $users,
            "keyword" =>$keyword,
            "sort" =>$sort
        ]);
    }

    public function ownerOrderList(Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $orders = Order::where('status_id', 2)->paginate(50);

        return view("owners/owner_order_list",[
            "orders" => $orders,
            // "keyword" =>$keyword
        ]);
    }


    public function searchProduct(Request $request){
        if(Auth::check()){
            if(Auth::user()->authority_flg == 0){
                return redirect ("/ownerpage");
            }
        }
        $user = new User;
        $product = new Product;
        $like_model = new Like;
        
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
    
        $products = $products->paginate(8);

        return view("/search_product",[
            "user"=>$user,
            "products"=> $products,
            "limit" =>$limit,
            "keyword" =>$keyword,
            'like_model'=>$like_model
        ]);
    }

    public function showProduct(Product $product){
        if(Auth::check()){
            if(Auth::user()->authority_flg == 0){
                return redirect ("/ownerpage");
            }
        }
        $reviews = Review::with("product")->where('product_id', $product->id)->get();

        return view("/show_product",[
            "product"=>$product,
            "reviews"=>$reviews,
            
        ]);
    }

    public function postReviewConf(Product $product){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        return view("/post_review_conf",[
            "product"=>$product
        ]);
    }

    public function cart(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $user =Auth::User();
        $orders = Order::with(["user","product"])->where('user_id', $user->id)->where('status_id', 0)->orderBy('id', 'desc')->get();

        return view("/cart",[
            "orders"=>$orders
        ]);
    }

    public function emptyCart(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        return view("/empty_cart",[
            
        ]);
    }

    public function address(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        $user =Auth::User();
        $address = Address::with("user")->where('user_id', $user->id)->latest("id")->first();
        if(empty($address)){
            return redirect("/post_address");
        }
        $orders = Order::with(["user","product"])->where('user_id', $user->id)->where('status_id', 0)->orderBy('id', 'desc')->get();


        return view("addresses/address",[
            "address"=> $address,
            "orders" =>$orders
        ]);
    }

    public function buyCartComp(Product $product){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        return view("/buy_cart_comp",[
            
        ]);
    }

    public function myPage(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        $user =Auth::User();
        $likes = Like::with(["user","product"])->where('user_id', $user->id)->get();
        
        return view("users/mypage",[
            "user"=> $user,
            "likes"=>$likes,
        ]);
    }

    public function editUserConf(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $user =Auth::User();
        return view("users/edit_user_conf",[
            "user"=>$user
        ]);
    }


    public function orderList(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        
        $user =Auth::User();
        $orders = Order::with(["user","product"])->where('user_id', $user->id)->where('status_id', 2)->orderBy('id', 'desc')->get();
        
        return view("users/order_list",[
            "orders"=>$orders,
        ]);
    }
}
