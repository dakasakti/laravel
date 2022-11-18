<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware("preventBackHistory");
        $this->middleware("guest", ["except" => "logout"]);
    }

    public function index()
    {
        return view("pages.auth.register")->with("title", "Register");
    }

    public function store(StoreRegisterRequest $request)
    {
        // $request->input("name") === $request->name;
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return to_route('login.index')->with("message", "Successfully registered, please check your email for verification");
    }

    public function login()
    {
        return view("pages.auth.login")->with("title", "Login");
    }

    public function authenticate(AuthLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->checkbox === "on")) {
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
