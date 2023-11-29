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
        // $encryptionone = '493275427158023849218444922492048902';
        // $encryptiontwo = '94721074921748127486217101204231940921034921849280';
        // $urlDetail = $encryptionone . $encryptiontwo . $request->input('product_id');
        return redirect()->route('posts.show', $request->input('post_id'));
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
