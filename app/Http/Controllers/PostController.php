<?php

namespace App\Http\Controllers;

use App\Interest;
use App\Post;
use App\User;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::id();

        $user = User::with('study')->where('id', Auth::id())->get();
        $post->study_id = $user[0]->study->id;

        $post->save();

        foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
        }

        return redirect()->route('user.study.index');
    }

    /**
     *
     * @param $id
     */
    public function show($id)
    {
        $post = Post::with('owner', 'tags')->where('id', $id)->get();

        return view('posts.detail')->withPost($post[0]);
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

//    public function addTag(Request $request) {
//        $user = Post::find(Auth::id());
//        $user->interests()->attach($request->id);
//
//        return $request->name;
//    }
}
