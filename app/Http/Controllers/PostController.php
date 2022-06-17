<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Settings;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    public function home ()
    {
        $posts = Post::all();
        foreach($posts as $post){
            if(!empty($post->post_images->first()))
            {
                $post->thumbnail = $post->post_images->first()->post_image_path;
            }

        }
        $quote = Settings::where('field', 'quote')->first();
        return Inertia::render('Home', [
            'posts' => $posts,
            'quote' => $quote
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;
        $images = $request->images;
        $post = Post::create([
            'title' => $title,
            'content' => $content
        ]);

        if(!empty($images)){
            foreach($images as $image) {
                $imagePath = Storage::disk('uploads')->put('./posts' . $post->id, $image);
                PostImage::create([
                    'post_id' => $post->id,
                    'post_image_caption' => $title,
                    'post_image_path' => '/uploads' . $imagePath,
                    
                ]);
            }
        }

        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $images = $post->post_images;
        return Inertia::render('Posts/Show', [
            'post' => $post,
            'images' => $images
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
