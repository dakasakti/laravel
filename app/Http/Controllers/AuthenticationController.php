<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest", ["except" => "logout"]);
    }

    public function index()
    {
        return view("pages.auth.register")->with("title", "Register");
    }

    public function store(StoreRegisterRequest $request)
    {
        User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
        ]);

        return to_route('login.index');
    }

    public function login()
    {
        return view("pages.auth.login")->with("title", "Login");
    }

    public function authenticate(AuthLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->input('checkbox') === "on" ? true : false)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'info' => 'Credentials is not valid',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
