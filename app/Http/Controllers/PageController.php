<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function home(){
        $post = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPost($post);
    }
    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
