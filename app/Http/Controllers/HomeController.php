<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $details['blogs'] = Post::with('user')->orderBy('id', 'desc')->get();

        return view('home', $details);
    }

    public function blogDetail($id)
    {
        $details['blog'] = Post::with('user')->where('id', $id)->first();

        return view('blog-detail', $details);
    }
}
