<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Like;
use App\Review;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','store', 'edit', 'update', 'destroy']]);
    }


    public function index(Request $request)
    {
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
    
        $products = $products->where('hidden_flg', 0)->where('del_flg', 0)->paginate(8);

        return view("product.index",[
            "user"=>$user,
            "products"=> $products,
            "limit" =>$limit,
            "keyword" =>$keyword,
            'like_model'=>$like_model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            if(Auth::user()->authority_flg == 1){
                return redirect ("/");
            }
    
            return view("product.create",[
                
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            if(Auth::user()->authority_flg == 0){
                return redirect ("/ownerpage");
            }
        }
        $product = Product::findOrFail($id);
        $reviews = Review::with("product")->where('product_id', $id)->get();

        return view("product.show",[
            "product"=>$product,
            "reviews"=>$reviews,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $product = Product::findOrFail($id);

        return view("product.edit",[
            "product"=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $product = Product::findOrFail($id);
        $columns =["name","price","introduction","stock"];
        foreach($columns as $column){
            $product->$column = $request->$column;
        }
        
        $product->save();

        return redirect("/edit_product_comp");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->authority_flg == 1){
            return redirect ("/");
        }
        $product = Product::findOrFail($id)->delete();

        return redirect("/ownerpage");
    }
}
