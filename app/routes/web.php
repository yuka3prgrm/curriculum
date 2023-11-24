<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [DisplayController::class, "index"])->name('/');
Route::get("/search_product",[DisplayController::class,"searchProduct"])->name("search_product");
Route::get("/show_product/{product}",[DisplayController::class,"showProduct"])->name("show_product");
Route::post("/show_product/{product}",[RegistrationController::class,"productToCart"]);

Route::group(["middleware" => "auth"],function(){
    Route::get("/post_review/{product}",[RegistrationController::class,"postReviewForm"])->name("post_review");
    Route::post("/post_review/{product}",[RegistrationController::class,"postReview"]);
    Route::get("/post_review_conf/{product}",[DisplayController::class,"postReviewConf"])->name("post_review_conf");
    Route::post("/add_cart/{product}",[RegistrationController::class,"addCart"])->name("add_cart");
    Route::get("/cart",[DisplayController::class,"cart"])->name("cart");
    Route::post("/del_cart/{order}",[RegistrationController::class,"delCart"])->name("del_cart");
    Route::get("/post_address",[RegistrationController::class,"postAddressForm"])->name("post_address");
    Route::Post("/post_address",[RegistrationController::class,"postAddress"]);
    Route::get("/address",[DisplayController::class,"address"])->name("address");
    Route::post("/address",[RegistrationController::class,"buyCart"]);
    Route::get("/buy_cart_comp",[DisplayController::class,"buyCartComp"])->name("buy_cart_comp");
    Route::get("/empty_cart",[DisplayController::class,"emptyCart"])->name("empty_cart");
    Route::get("/mypage/{user}",[DisplayController::class,"myPage"])->name("mypage");
    Route::get("/edit_user/{user}",[RegistrationController::class,"editUserForm"])->name("edit_user");
    Route::post("/edit_user/{user}",[RegistrationController::class,"editUser"]);
    Route::get("/delete_user/{user}",[RegistrationController::class,"deleteUserForm"])->name("delete_user");
    Route::post("/delete_user/{user}",[RegistrationController::class,"deleteUser"]);
    Route::get("/order_list",[DisplayController::class,"orderList"])->name("order_list");
    Route::post("/add_like",[RegistrationController::class,"addLike"])->name("add_like");
    Route::post("/delete_like/{like}",[RegistrationController::class,"deleteLike"])->name("delete_like");

  
    Route::get("/ownerpage",[DisplayController::class,"ownerPage"])->name("ownerpage");
    Route::get("/post_product",[RegistrationController::class,"postProduct"])->name("post_product");
    Route::post("/post_product",[RegistrationController::class,"createProduct"]);
    Route::get("/post_product_comp",[DisplayController::class,"postProductComp"])->name("post_product_comp");
    Route::get("/edit_product/{product}",[RegistrationController::class,"editProductForm"])->name("edit_product");
    Route::post("/edit_product/{product}",[RegistrationController::class,"editProduct"]);
    Route::get("/edit_product_comp",[DisplayController::class,"editProductComp"])->name("edit_product_comp");
    Route::post("/hidden_product/{product}",[RegistrationController::class,"hiddenProduct"])->name("hidden_product");
    Route::post("/hidden_product2/{product}",[RegistrationController::class,"hiddenProduct2"])->name("hidden_product2");
    Route::post("/delete_product/{product}",[RegistrationController::class,"deleteProduct"])->name("delete_product");
    Route::post("/edit_product/{product}",[RegistrationController::class,"editProduct"]);
    Route::get("/user_list",[DisplayController::class,"userList"])->name("user_list");
    Route::get("/owner_order_list",[DisplayController::class,"ownerOrderList"])->name("owner_order_list");
});