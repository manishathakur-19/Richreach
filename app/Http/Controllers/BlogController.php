<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::where('user_id', auth()->id())->orderBy('id', 'desc');

        $details['blogs'] = $blogs->paginate(20);

        return view('blog-list', $details);
    }

    public function create()
    {
        return view('add-blog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('blogs')->with('success', 'Blog Created Successfully!');
    }

    public function edit($id)
    {
        $details['blog'] = Post::where('id', $id)->first();

        return view('edit-blog', $details);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->updated_at = date("Y-m-d H:i:s");

        $update_post = $post->update();

        if($update_post)
        {
          return redirect()->route('blogs')->with('success', 'Blog Updated Successfully!');   
        }

    }

    public function destroy(Request $request, $id)
    {
        $delete_post = Post::destroy($id);

        if($delete_post)
        {
          return redirect()->route('blogs')->with('success', 'Blog Deleted Successfully!');   
        }
    }
}
