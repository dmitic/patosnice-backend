<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $posts = Post::all();
         return view('posts.posts', compact('posts'));
    }

    public function status(Post $post){
        $post->update(['aktivan' => ! $post->aktivan]);
        return back()->withErrors(['poruka' => 'Post je aktiviran/deaktiviran!']);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')
                    ->withErrors(['poruka' => 'Post je obrisan!']);
    }
}
