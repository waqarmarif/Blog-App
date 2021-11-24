<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_Tag;
use Illuminate\Support\Facades\Session;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $deletedposts = Post::onlyTrashed()->get();
        // dd($deletedposts->count());
        return view('posts.index')->withPosts($posts)->withDeletedposts($deletedposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('hjjh');
        $categories = Category::all();
        $tags = Tag::all();
        // dd($tags->count());
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
     //dd($request->tags);
        $validated = $request->validated();
        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'category_id' => $request->category_id,

        ]);
        $post->save();
        //$post->tags()->sync($request->tags,false);
        foreach ($request->tags as $tag) {
            $create_tag = Post_Tag::create([
                'post_id' => $post->id,
                'tag_id' => $tag
            ]);
            $create_tag->save();
            //dd('hello');
        }
        // $category = Category::create()

        Session::flash('success', 'Data stored successfully');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $tag = $post->tags()->get();
        //dd($tag);
        return view('posts.show')->withPost($post)->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags2($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validated();
        $post = Post::find($id);
        if ($post->title == $request->input('title') or $post->slug == $request->input('slug')) {
            $request->validate([
                'body' => 'required'
            ]);
        } else {
            $request->validate([
                'title' => 'required|unique:posts,title',
                'body' => 'required',
                'category_id' => 'required'
            ]);
        }
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->sync($request->tags);

       

        Session::flash('success', 'Data updated successfully');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        $post->tags()->detach();
        Session::flash('success', 'Post has been deleted');
        return redirect()->route('post.index');
    }

    public function restore($id)
    {

        Post::withTrashed()->find($id)->restore();
        Session::flash('success', 'Post has restore');
        return redirect()->route('post.index');
    }


}
