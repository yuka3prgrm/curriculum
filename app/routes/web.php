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

Route::get('/', [DisplayController::class, "index"])->name('home');
Route::get("/ownerpage",[DisplayController::class,"ownerPage"])->name("ownerpage");
Route::get("/post_product",[RegistrationController::class,"postProduct"])->name("post_product");
Route::post("/post_product",[RegistrationController::class,"createProduct"]);
Route::get("/post_product_comp",[DisplayController::class,"postProductComp"])->name("post_product_comp");
Route::get("/edit_product/{product}",[RegistrationController::class,"editProductForm"])->name("edit_product");
Route::post("/edit_product/{product}",[RegistrationController::class,"editProduct"]);
Route::get("/edit_product_comp",[DisplayController::class,"editProductComp"])->name("edit_product_comp");
Route::get("/user_list",[DisplayController::class,"userList"])->name("user_list");
Route::get("/search_product",[DisplayController::class,"searchProduct"])->name("search_product");
Route::get("/show_product/{product}",[DisplayController::class,"showProduct"])->name("show_product");
Route::post("/show_product/{product}",[RegistrationController::class,"productToCart"]);
Route::get("/post_review/{product}",[RegistrationController::class,"postReviewForm"])->name("post_review");
Route::post("/post_review/{product}",[RegistrationController::class,"postReview"]);
Route::get("/post_review_conf/{product}",[DisplayController::class,"postReviewConf"])->name("post_review_conf");
Route::post("/add_cart/{product}",[RegistrationController::class,"addCart"])->name("add_cart");
Route::get("/cart/{order}",[RegistrationController::class,"cart"])->name("cart");

Route::get("/mypage/{user}",[DisplayController::class,"myPage"])->name("mypage");
Route::get("/edit_user/{user}",[RegistrationController::class,"editUserForm"])->name("edit_user");
Route::post("/edit_user/{user}",[RegistrationController::class,"editUser"]);
Route::get("/delete_user/{user}",[RegistrationController::class,"deleteUserForm"])->name("delete_user");
Route::post("/delete_user/{user}",[RegistrationController::class,"deleteUser"]);
