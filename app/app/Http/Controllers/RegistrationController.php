<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

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

    
}
