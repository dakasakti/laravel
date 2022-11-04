<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view("pages.profile")->with("title", "Profile");
    }

    public function show()
    {
        return view("pages.landing")->with("title", "Landing");
    }
}
