<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BlogController as ControllersBlogController;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends ControllersBlogController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BlogResource::collection(Blog::latest()->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        Blog::create([
            "title" => $request->title,
            "body" => $request->body,
            "image_path" => $this->storeImage($request->image),
            "user_id" => Auth::id(),
        ]);

        return response([
            "message" => "Blog created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (! Gate::allows('status-users', $blog)) {
            return response([
                "message" => "You are not allowed to use this resoure"
            ], 403);
        }

        $imagePath = $blog->image_path;

        // new
        if ($request->has('image')) {
            $this->deleteImage($imagePath);
            $imagePath = $this->storeImage($request->image);
        }

        $blog->slug = null;
        $blog->update([
            "title" => $request->title ?? $blog->title,
            "body" => $request->body ?? $blog->body,
            "image_path" => $imagePath,
        ]);

        return response([
            "message" => "Blog updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (! Gate::allows('status-users', $blog)) {
            return response([
                "message" => "You are not allowed to use this resoure"
            ], 403);
        }

        $this->deleteImage($blog->image_path);
        $blog->delete();

        return response(null, 204);
    }
}
