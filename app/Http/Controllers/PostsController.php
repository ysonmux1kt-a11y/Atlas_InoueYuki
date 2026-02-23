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
    $user = Auth::user();

    // フォローしているユーザー（Userモデル）の id を取得
    $followIds = $user->follows()->pluck('users.id');

    // 自分のIDも含める
    $followIds->push($user->id);

    // 自分＋フォロー中ユーザーの投稿だけ取得
    $posts = Post::with('user')
        ->whereIn('user_id', $followIds)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('posts.index', compact('posts'));
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


    public function update(Request $request,Post $post){
        //自分の投稿かチェック
        if($post->user_id !== Auth::id()){
            abort(403);
        }
        $request->validate([
            'content' => ['required', 'string', 'min:1', 'max:150'],
        ]);

        // 更新
        $post->content = $request->content;
        $post->save();

        return redirect()->route('top');
    }

    public function destroy(Post $post){
        //自分の投稿かチェック
        if($post->user_id !== Auth::id()){
            abort(403);
        }
        $post->delete();

        return redirect()->route('top');
    }
}
