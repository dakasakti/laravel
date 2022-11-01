<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::select("SELECT * FROM posts");

        return view("posts.index", compact('posts'));
    }
}
