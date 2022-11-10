<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // statement -> return boolean
        // $posts = DB::statement("SELECT * FROM posts");

        // select -> return array (object std class)
        // $posts = DB::select("SELECT * FROM posts");

        // potensial sql injection
        // $posts = DB::select("SELECT * FROM posts WHERE id = 1");

        // solve the problem -> binding
        // $posts = DB::select("SELECT * FROM posts WHERE id = ?", [1]);

        // multiple parameter
        // $posts = DB::select("SELECT * FROM posts WHERE id = :id", ["id" => 1]);

        // method type
        // select, insert, update, delete

        // query builder
        // custom column
        // $posts = DB::table('posts')->select("title")->get();

        // custom select data
        // general
        // $posts = DB::table('posts')->where("id", "=", 5)->get();

        // if only the equal can use this
        // $posts = DB::table('posts')->where("id", 5)->get();

        // condition type
        // where, whereBetween, whereNotBetween, whereIn, whereNull, wheteNotNull

        // unique type -> default column id
        // distinct

        // sorting
        // orderBy => orderBy("id", "DESC")

        // skip and take
        // skip(30)->take(10)

        // random
        // inRandomOrder()

        // rowData
        // get() => all, first() or find() => limit 1

        // return Data
        // value(), count(), min(), max(), sum(), avg()
        // example => where("id", 1)->value("body")

        // all column
        $posts = DB::table('posts')->get();
        return view("posts.index", compact('posts'))->with("title", "Posts");
    }
}
