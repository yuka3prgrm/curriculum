<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\User;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user =Auth::User();

        return view("home",[
            "user"=>$user
        ]);
    }

    public function ownerPage(){
        $user =Auth::User();
        $product = new Product;
        $all = $product->all()->toArray();


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
}
