<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;

class FeedController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::where('created_at', '>=', Carbon::now()->subDay())->latest()->paginate(6);

        return view('pages/feed', [
            'posts' => $posts,
        ]);

    }

    public function search() {
        $search_text = $_GET['query'];
        $posts = Post::where('created_at', '>=', Carbon::now()->subDay())->where('title', 'LIKE', '%'.$search_text.'%')->latest()->paginate(6);
        return view('pages/feed', [
            'posts' => $posts,
        ]);
    }

}