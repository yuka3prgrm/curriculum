<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Review;
use App\Order;

use Illuminate\Support\Facades\Auth;

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

    public function postReview(Request $request){
        $review = new Review;

        $columns =["title","comment"];
        foreach($columns as $column){
            $review->$column = $request->$column;
        }

        Auth::user()->product()->save($review);

        return redirect("/post_review_conf");
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

        return redirect("/show_product");
    }

    public function cart(){
        $order = new Order;
        $orders = $order->orderBy('id', 'desc')->get()->toArray();

        return view("/cart",[
            "orders"=>$order
        ]);
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
    
}
