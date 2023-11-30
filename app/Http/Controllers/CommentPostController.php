<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'post_id' => 'required',
            'content' => 'required',
        ]);
        $comments = new CommentPost($request->all());
        $comments->content = $request->input('content');
        $comments->save();
        $post = Post::find($request->input('post_id'));
        $post->comment_count += 1;
        $post->save();
        $encryptionone = '123123jnjnbj1v3g12c3g123vgmnsadsf98f9sd8f09sd8f09sd8f0s';
        $encryptiontwo = '3i192u3j13bnj12b3b398191830183ksdmadmkfnajsnfas98f980a8';
        $urlDetail = $encryptionone . $encryptiontwo . $request->input('post_id');
        return redirect()->route('posts.show', $urlDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
