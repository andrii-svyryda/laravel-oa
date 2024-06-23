<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;

class PostController extends Controller
{
    public function index()
    {
        return BlogPost::with(['user', 'category'])->get();
    }

    /**
     * Display the specified post.
     */
    public function show(string $id)
    {
        return BlogPost::with(['user', 'category'])->find($id);
    }

    // POST /api/posts
    public function store(BlogPostCreateRequest $request)
    {
        $post = BlogPost::create($request->all());
        return response()->json($post, 201);
    }

    // PUT /api/posts/{id}
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    // DELETE /api/posts/{id}
    public function destroy($id)
    {
        BlogPost::destroy($id);
        return response()->json(null, 204);
    }
}
