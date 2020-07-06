<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Blog Post index function
     * 
     * @return view
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
    /**
     * Blog Post show function
     * 
     * @return view
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('blog-post', compact('post'));
    }

    /**
     * Blog Post create function
     * 
     * @return view
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Blog Post store function
     * 
     * @return view
     */
    public function store()
    {
        $inputs = request()->validate(
            [
                'title'         => 'required | min: 8 | max: 255',
                'post_image'    => 'file',
                'body'          => 'required'
            ]
        );

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-create-message', 'Post was created.');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = request()->validate(
            [
                'title'         => 'required | min: 8 | max: 255',
                'post_image'    => 'file',
                'body'          => 'required'
            ]
        );

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->update();
        session()->flash('post-update-message', 'Post was update');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('post-delete-message', 'Post was deleted.');
        return back();
    }
}
