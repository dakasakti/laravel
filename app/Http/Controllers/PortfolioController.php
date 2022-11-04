<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() {
        $names = ["david", "michelle", "kaila"];
        return view("portfolio.index", compact("names"))->with(["name" => "dakasakti", "title" => "Portfolio"]);
    }
}
