<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\User;
use App\Review;

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

    public function ownerPage(){
        $user =Auth::User();
        $product = new Product;
        $all = $product->orderBy('id', 'desc')->get()->toArray();


        return view("owners/ownerpage",[
            "user"=> $user,
            "products"=> $all
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

    public function userList(){
        $user = new User;
        $all = $user->all()->toArray();

        return view("owners/user_list",[
            "users" => $all,
        ]);
    }

    public function searchProduct(Request $request){
        $user = new User;
        $product = new Product;
        $products = $product->orderBy('id', 'desc')->get()->toArray();

        return view("/search_product",[
            "user"=>$user,
            "products"=> $products
        ]);
    }

    public function showProduct(Product $product){
        $review = new Review;
        $all = $review->all()->toArray();

        return view("/show_product",[
            "product"=>$product,
            "reviews"=>$all
        ]);
    }

    public function postReviewConf(Product $product){

        return view("/post_review_conf",[
            "product"=>$product
        ]);
    }

    public function myPage(){
        $user =Auth::User();
        
        return view("/mypage",[
            "user"=> $user,
        ]);
    }

    public function deleteUserConf(User $user){

        return view("/delete_user_conf",[
            "user"=>$user
        ]);
    }

}
