<?php

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories/{id}', function ($id) {
    $category = Category::findOrFail($id);
    return new CategoryResource($category);
});

Route::get('products/{id}', function ($id) {
    $prod = Product::findOrFail($id);
    return new ProductResource($prod);
});

Route::get('products', function () {
    $prod = Product::all();
    return new ProductCollection($prod);
});

Route::get('categories', function () {
    $categories = Category::all();
    return CategoryResource::collection($categories);
});

// resource collection custom akan membuat file class baru, dan kita bisa leluasa menambah attribut data
Route::get('categories-custom', function () {
    $categories = Category::all();
    return new CategoryCollection($categories);
});