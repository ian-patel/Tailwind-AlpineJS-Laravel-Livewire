<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('source')
            ->active()
            ->latest()
            ->simplePaginate(30);

        if (Auth::user()) {
            $posts = Post::AppendFavorite($posts, Auth::user());
        }

        return view('pages.welcome')
            ->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        $posts = Post::search($q)
            ->with('source')
            ->active()
            ->latest()
            ->orderby('clicks', 'desc')
            ->simplePaginate(30);

        if (Auth::user()) {
            $posts = Post::AppendFavorite($posts, Auth::user());
        }

        return view('pages.search')
            ->with(['posts' => $posts ?? collect()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::active()->with('source')->findOrFail($id);

        $post->increment('clicks');

        if (!$post->source->is_frame_allowed) {
            return response()->redirectTo($post->link, 301);
        }

        return view('pages.post-view')
            ->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
