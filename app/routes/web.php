<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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
Route::get("/post_product_comp/{id}",[DisplayController::class,"postProductComp"])->name("post_product_comp");
Route::get("/edit_product/{product}",[RegistrationController::class,"editProductForm"])->name("edit_product");
Route::post("/edit_product/{product}",[RegistrationController::class,"editProduct"]);
Route::get("/edit_product_comp",[DisplayController::class,"editProductComp"])->name("edit_product_comp");
Route::get("/user_list",[DisplayController::class,"userList"])->name("user_list");