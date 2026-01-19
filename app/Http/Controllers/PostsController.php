<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    // トップページ表示
    public function index()
    {
        return view('posts.index');
    }

    // 投稿保存
    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string', 'min:1', 'max:150'],
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('top');
    }
}
