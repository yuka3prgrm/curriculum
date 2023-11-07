<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user =Auth::User();

        return view("home",[
            "user"=>$user
        ]);
    }
}
