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
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        return view("owners/post_product",[
            
        ]);
    }

    public function createProduct(Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

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
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        return view("owners/edit_product",[
            "product"=>$product
        ]);
    }

    public function editProduct(Product $product, Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        $columns =["name","price","introduction","stock"];
        foreach($columns as $column){
            $product->$column = $request->$column;
        }
        
        $product->save();

        return redirect("/edit_product_comp");
    }
    public function hiddenProduct(Product $product, Request $request){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        $product->hidden_flg = 1;
        
        $product->save();

        return redirect("/edit_product_comp");
    }

    public function hiddenProduct2(Product $product){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        $product->hidden_flg = 0;
        
        $product->save();

        return redirect("/edit_product_comp");
    }

    public function deleteProduct(Product $product){
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }

        $product->del_flg = 1;

        $product->save();

        return redirect("/ownerpage");
    }

    public function postReviewForm(Product $product){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        return view("/post_review",[
            "product"=>$product
        ]);
    }

    public function postReview(Product $product, Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

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
    
    public function addCart(Product $product, Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        
        $productId = $product->id;
        $userId= Auth::user()->id;

        $order = new Order;
        $order ->amount =$request-> amount;
        $order ->status_id =0;
        $order ->user_id =$userId;
        $order ->product_id = $productId;

        $order->save();

        return redirect()->route("show_product", ['product' => $productId]);
    }

    public function delCart(Order $order){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

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
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $user =Auth::User();
        $address = Address::with("user")->where('user_id', $user->id)->latest("id")->first();
        Order::where('user_id', $user->id)
        ->where('status_id', 0)
        ->update(['status_id' => 2,'address_id'=>$address->id]);
        // $orders = Order::where('user_id', $user->id)->where('status_id', 0);
        // foreach($orders as $order){
        //     $order->status_id = 2;
        //     $order->address_id = $address->id;
        //     $order->save();
        // }
        
            return redirect("/buy_cart_comp");
    }

    public function postAddressForm(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        return view("addresses/post_address",[
        ]);
    }

    public function postAddress(Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $address = new Address;

        $columns =['fullname','tel','postal_code','place'];
        foreach($columns as $column){
            $address->$column = $request->$column;
        }
        $address ->user_id =Auth::user()->id;
        $address->save();

        return redirect("/address");
    }

    public function editUserForm(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $user= Auth::user();

        return view("users/edit_user",[
            "user"=>$user
        ]);
    }

    public function editUser(User $user, Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        $columns =["name","email","password"];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        
        $user->save();

        return redirect("/edit_user_conf");
    }

    public function deleteUserForm(){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $user= Auth::user();

        return view("users/delete_user",[
            "user"=>$user
        ]);
    }

    public function deleteUser(User $user, Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }

        $user->del_flg = 1;
        
        $user->save();
        Auth::logout();

        return redirect("/login");
    }
    

    public function addLike(Request $request){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $product_id = $request->product_id;
        $userId = Auth::user()->id;
        
        $like = new Like;
        $product = Product::findOrFail($product_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($userId, $product_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('product_id', $product_id)->where('user_id', $userId)->delete();
            $status = 'unliked';
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->user_id = $userId;
            $like->product_id = $product_id;
            $like->save();
            $status = 'liked';
        }
       
            return response()->json(['status' => $status]);
    }

    public function deleteLike(Like $like){
        if(Auth::user()->authority_flg == 0){
            return redirect ("/ownerpage");
        }
        $userId = Auth::user()->id;
        $like->delete();
       
        return redirect()->route("mypage", ['user' => $userId]);
    }

}
