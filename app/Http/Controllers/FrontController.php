<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index() {
        // $posts = Post::all();

        $post = Post::orderBy('id', 'DESC')->first(); // Get the first post from the collection
        $postID = $post->id;
        $posts = Post::where('id','!=',$postID)->orderBy('id', 'DESC')->paginate(8);
        return view('front.index', compact('posts','post'));
    }

    public function BlogItem($id) {
        $post = Post::find($id);
        $categoryID = $post->category_id;
        $related_items = Post::where('category_id', $categoryID)->where('id','!=',$id)->orderBy('id', 'DESC')->limit(4)->get();

        return view('front.detail', compact('post', 'related_items'));
    }

    public function postsCategory($category_id) {
        $posts = Post::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(8);
        return view('front.post-category', compact('posts'));
    }
}
