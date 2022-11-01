<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// send view
Route::get('/', [PortfolioController::class, "index"]);

// send string
Route::get('/string', function () {
    return "Hello World";
});

// send array
Route::get('/array', function () {
    return ["PHP", "Laravel"];
});

// send JSON(object)
Route::get('/json', function () {
    return response()->json([
        "username" => "dakasakti",
    ]);
});

// send function
Route::get('/function', function () {
    return redirect("/");
});

// from controllers
Route::get("/products1", [ProductController::class, 'index'])->name("products");
Route::get("/products2", [ProductController::class, 'index2']);
Route::get("/products3", [ProductController::class, 'index3']);

// route parameter
Route::get("/products/{id}", [ProductController::class, "show"])->where("id", "[0-9]+");

Route::get("/products", [ProductController::class, 'index'])->name("products");

Route::get("/blog", [PostController::class, "index"]);
