<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user());
            if (Auth::user()->hasRole('superadministrator')) {
                $posts= Post::all();
                return view('posts.index')->withPosts($posts);

            } elseif(Auth::user()->hasRole('administrator')) {

                return view('downloads');
                
            }
        }
    }
}
