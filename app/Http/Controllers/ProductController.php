<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // compact method
    public function index() {
        $title = "This is title";

        return view("index", compact("title"));
    }

    // with method
    public function index2() {
        $data = "Data title";

        return view("index")->with("data", $data);
    }

    // directly method
    public function index3() {
        $description = "Data description";

        return view("index", [
            "description" => $description,
        ]);
    }
}
