<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $featured = Post::latest()->first();

        $posts = Post::where('id', '!=', optional($featured)->id)
                    ->latest()
                    ->get();

        $popularPosts = Post::latest()->take(5)->get();

        return view('posts.index', compact(
            'featured',
            'posts',
            'popularPosts'
        ));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'photo'=>'required',
            'publisher'=>'required',
            'content'=>'required',
            'published'=>'required'
        ]);

        Post::create($request->all());

        return redirect()
            ->route('posts.index')
            ->with('success','Berita berhasil ditambahkan');
    }

    public function show(Post $post)
    {

        $relatedPosts = Post::where('id','!=',$post->id)
                            ->latest()
                            ->take(4)
                            ->get();

        return view('posts.show',compact(
            'post',
            'relatedPosts'
        ));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post_edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:255',
            'photo'=>'required',
            'publisher'=>'required',
            'content'=>'required',
            'published'=>'required'
        ]);

        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('success','Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()
            ->route('posts.index')
            ->with('success','Berita berhasil dihapus');
    }
}
