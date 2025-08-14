<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation first
        $request->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|unique:posts',
        ]);

        return response()->json(Post::create($request->all())) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id) ;
        return response()->json($post) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id) ;
        $request->validate([
            'title' => 'min:3|max:255',
            'slug' => 'unique:posts,slug,'.$post->id,
        ]);
        $post->update($request->all()) ;
        return response()->json($post) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id) ;
        return response()->json(['message' => 'Post Deleted Successfully deleted']) ;
    }
}
