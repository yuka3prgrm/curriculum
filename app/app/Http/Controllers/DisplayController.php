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

    public function ownerPage(Request $request){
        $user =Auth::User();

        return view("owners/ownerpage",[
            "user"=>$user
        ]);
    }

    public function postProductComp(Request $request){
        $productId = $request->get('product_id');
        $product = Product::find($productId);

        return view("owners/post_product_comp",[
            'product' => $product,
        ]);
    }

    public function editProductComp(Request $request){
        $productId = $request->get('product_id');
        $product = Product::find($productId);

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
