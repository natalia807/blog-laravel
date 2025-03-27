<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class PostController extends Controller
{
    public function index()
{
    $posts = Post::orderBy('created_at', 'desc')->get();
    $posts = Post::latest()->paginate(6);
    return view('posts.index', compact('posts'));
}

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    public function adminIndex()
{
    $posts = Post::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();
    
    $posts = Post::latest()->paginate(6);

    return view('admin.posts.index', compact('posts'));
}

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => Storage::url($imagePath),
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Acesso não autorizado.');
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Acesso não autorizado.');
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($imagePath);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'Acesso não autorizado.');
        }

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
    public function adminShow(Post $post)
{
    if (auth()->id() !== $post->user_id) {
        abort(403, 'Acesso não autorizado.');
    }

    return view('admin.posts.show', compact('post'));
}
public function search(Request $request)
{
    $query = $request->input('query');

    $posts = Post::where('title', 'LIKE', "%$query%")
                 ->orWhere('content', 'LIKE', "%$query%")
                 ->get();

    return view('search', compact('posts', 'query'));
}
}