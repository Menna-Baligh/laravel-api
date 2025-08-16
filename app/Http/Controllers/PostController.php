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
        $post = Post::find($id) ;
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $request->validate([
            'title' => 'nullable|min:3|max:255',
            'slug'  => 'nullable|unique:posts,slug,' . $post->id,
            'likes' => 'nullable|integer',
        ]);


        $post->update($request->all());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id) ;
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $post->delete() ;
        return response()->json(['message' => 'Post deleted successfully']) ;
    }
    public function search($title){
        $posts = Post::where('title','like','%'.$title.'%')->get() ;
        return response()->json($posts) ;
    }
}
