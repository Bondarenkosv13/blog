<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', '=', auth()->user()->id)->paginate(5);
        return view('admin.blog.posts', compact('posts'));
    }

}
