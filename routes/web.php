<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAccountController;
use Barryvdh\Debugbar\Facades\Debugbar;
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
Route::get('view', [PortfolioController::class, "index"]);

// send string
Route::get('string', function () {
    return "Hello World";
});

// send array
Route::get('array', function () {
    return ["PHP", "Laravel"];
});

// send JSON(object)
Route::get('json', function () {
    return response()->json([
        "username" => "dakasakti",
    ]);
});

// send function
Route::get('function', function () {
    return redirect("/");
});

// from controllers
Route::get("products1", [ProductController::class, 'index'])->name("products");
Route::get("products2", [ProductController::class, 'index2']);
Route::get("products3", [ProductController::class, 'index3']);

// route parameter
Route::get("products/{id}", [ProductController::class, "show"])->where("id", "[0-9]+");
Route::get("posts", [PostController::class, "index"]);

Route::get("", function () {
    Debugbar::info("message is info");
    return view("pages.index")->with("title", "Index");
});

Route::prefix('admin')->group(function () {
    Route::resource('', AdminController::class);
    Route::resource('blog', BlogController::class);
});

Route::get("profile", [ProfileController::class, "index"])->name("profile");
Route::get("landing", [ProfileController::class, "show"])->name("landing");

Route::prefix('auth')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get("register", "index")->name("register.index");
        Route::post("register", "store")->name("register.store");
        Route::get("login", "login")->name("login.index");
        Route::post("login", "authenticate")->name("login.auth");
        Route::post("logout", "logout")->name("logout");
    });

    // auth by social_accounts
    Route::controller(SocialAccountController::class)->group(function () {
        Route::get("{name}/", "index");
        Route::get("{name}/callback", "callback");
    });
});

// verification email
Route::prefix('email')->group(function () {
    Route::controller(EmailController::class)->group(function () {
        Route::get("verify", "index")->name('verification.notice');
        Route::get('verify/{id}/{hash}', "verify")->name('verification.verify');
        Route::post('verification-notification', "resend")->name('verification.send');
    });
});

// fallback view
// Route::fallback(FallbackController::class);
