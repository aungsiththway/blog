<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category','user')->orderBy('id', 'DESC')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        $data = $request->all();
        $data['status'] = 'draft';
        $posts = Post::create($data);

        //file upload
        $file_name = time() . '.' . $request->image->extension(); //28971491827.jpg

        //folder ထဲကို upload လုပ်မယ်
        $upload = $request->image->move(public_path('images/items/'), $file_name);

        if ($upload){
            $posts->image = "/images/items/" . $file_name;
        }

        $posts->save();

        return redirect()->route('admin.posts.index');
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
        $post = Post::find($id);
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.edit', compact('post','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $post = Post::find($id);
        $post->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->extension(); //28971491827.jpg

            //folder ထဲကို upload လုပ်မယ်
            $upload = $request->image->move(public_path('images/items/'), $file_name);

            if ($upload) {
                $post->image = "/images/items/" . $file_name;
            }
        }else {
            $post->image = $request->old_image;
        }

        $post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
