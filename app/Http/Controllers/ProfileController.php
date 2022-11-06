<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $user = User::find($id);
        $site_title = $user->fname . " " . $user->lname;
        $posts = Post::where('user_id', $user->id)->where('created_at', '>=', Carbon::now()->subDay())->latest()->get();
        $post_count = Post::where('user_id', $user->id)->count();

        return view('pages/profile', [
            'site_title' => $site_title,
            'user' => $user,
            'posts' => $posts,
            'post_count' => $post_count,
        ]);
    }

    public function search($id) 
    {

        $user = User::find($id);
        $site_title = $user->fname . " " . $user->lname;
        $search_text = $_GET['query'];
        $posts = Post::where('user_id', $user->id)->where('created_at', '>=', Carbon::now()->subDay())->where('title', 'LIKE', '%'.$search_text.'%')->latest()->get();
        $post_count = Post::where('user_id', $user->id)->count();

        return view('pages/profile', [
            'site_title' => $site_title,
            'user' => $user,
            'posts' => $posts,
            'post_count' => $post_count,
        ]);
    }
}