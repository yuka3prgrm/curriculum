<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Review;
use App\Order;
use App\Like;
use App\Address;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class RegistrationController extends Controller
{
    //管理者ページ
    public function postProduct(){

        return view("owners/post_product",[
            
        ]);
    }

    public function createProduct(Request $request){
        $product = new Product;

        $img = $request->file('image');
        $path = $img->store('img','public');
        $product->image = $path;
        $columns =["name","price","introduction","stock"];
        foreach($columns as $column){
            $product->$column = $request->$column;
        }

        $product->save();

        return redirect("/post_product_comp");
    }

    public function editProductForm(Product $product){

        return view("owners/edit_product",[
            "product"=>$product
        ]);
    }

    public function editProduct(Product $product, Request $request){

        $columns =["name","price","introduction","stock"];
        foreach($columns as $column){
            $product->$column = $request->$column;
        }
        
        $product->save();

        return redirect("/edit_product_comp");
    }

    public function postReviewForm(Product $product){

        return view("/post_review",[
            "product"=>$product
        ]);
    }

    public function postReview(Product $product, Request $request){
        $review = new Review;
        $productId = $product->id;
        $userId= Auth::user()->id;

        $review ->title =$request->title;
        $review ->comment = $request->comment;
        $review ->user_id =$userId;
        $review ->product_id = $productId;
        
        $review->save();

        return redirect()->route("post_review_conf", ['product' => $productId]);
    }
    
    public function addCart(Product $product){
        
        $productId = $product->id;
        $userId= Auth::user()->id;

        $order = new Order;
        $order ->amount =1;
        $order ->status_id =0;
        $order ->user_id =$userId;
        $order ->product_id = $productId;

        $order->save();

        return redirect("/");
        //Ajax使いたい
    }

    public function delCart(Order $order){
        $userId= Auth::user()->id;
        $order ->status_id =1;
       
        $order->save();

        if(Auth::user()->orders()->where('status_id', 0)->count() >= 1){
            return redirect()->route("cart", ['user' => $userId]);
        }else{
            return redirect("/empty_cart");
        }
    }

    public function buyCart(){
        $user =Auth::User();
        Order::where('user_id', $user->id)
        ->where('status_id', 0)
        ->update(['status_id' => 2]);
        
            return redirect("/buy_cart_comp");
    }

    public function postAddressForm(){
        $prefectures = Config::get('pref');

        return view("addresses/post_address", compact('prefectures'),[
        ]);
    }

    public function postAddress(Request $request){
        $address = new Address;

        $columns =['fullname','tel','postal_code','prefecture_id','city','house_number','building_name'];
        foreach($columns as $column){
            $address->$column = $request->$column;
        }
        $address ->user_id =Auth::user()->id;
        $address->save();

        return redirect("/address");
    }

    public function editUserForm(){
        $user= Auth::user();

        return view("/edit_user",[
            "user"=>$user
        ]);
    }

    public function editUser(User $user, Request $request){

        $columns =["name","email","password"];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        
        $user->save();

        return redirect("/edit_user_conf");
    }

    public function deleteUserForm(){
        $user= Auth::user();

        return view("/delete_user",[
            "user"=>$user
        ]);
    }

    public function deleteUser(User $user, Request $request){

        $user->del_flg = 1;
        
        $user->save();

        return redirect("/delete_user_comp");
    }
    

    public function addLike(Product $product){
        
        $productId = $product->id;
        $userId= Auth::user()->id;

        $like = new Like;
        $like ->del_flg =0;
        $like ->user_id =$userId;
        $like ->product_id = $productId;

        $like->save();

        return redirect("/");
        //Ajax使いたい
    }

}
