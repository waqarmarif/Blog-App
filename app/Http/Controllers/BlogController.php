<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug',$slug)->first();
        
        return view('blogs.single')->withPost($post);
    }



}
