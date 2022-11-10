<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth", ['except' => ["show"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->with('user')->where(["user_id" => Auth::id()])->get();
        return view("blogs.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        // $blog = new Blog;
        // $blog->title = $request->input("title");
        // $blog->slug = $request->input("slug");
        // $blog->body = $request->input("body");
        // $blog->user_id = 1;
        // $blog->save();

        // eloquent model => access fillable or guard in model (assingment)
        Blog::create([
            "title" => $request->title,
            "body" => $request->body,
            "image_path" => $this->storeImage($request->image),
            "user_id" => Auth::id(),
        ]);

        return to_route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        dd($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if (! Gate::allows('update-blog', $blog)) {
            abort(403);
        }

        return view("blogs.edit", compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        // old
        $imagePath = $blog->image_path;

        // new
        if ($request->has('image')) {
            $this->deleteImage($imagePath);
            $imagePath = $this->storeImage($request->image);
        }

        $blog->slug = null;
        $blog->update([
            "title" => $request->title,
            "body" => $request->body,
            "image_path" => $imagePath,
        ]);

        return to_route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->deleteImage($blog->image_path);
        $blog->delete();
        return to_route('blog.index');
    }

    private function storeImage($image)
    {
        $imagePath = time() . "." . $image->extension();
        $image->move(public_path("storage/images"), $imagePath);

        return $imagePath;
    }

    private function deleteImage($path)
    {
        File::delete(public_path("storage/images/" . $path));
    }
}
