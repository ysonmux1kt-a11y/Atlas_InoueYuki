<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followList()
{
    $userId = Auth::id();

    // フォロー中のユーザーIDだけを配列として取得
    $followedUserIds = Follow::where('following_id', $userId)
                             ->pluck('followed_id')
                             ->toArray();

    // フォロー中ユーザー一覧（アイコン表示用）
    $followedUsers = User::whereIn('id', $followedUserIds)->get();

    // フォロー中のユーザーの投稿一覧（新しい順）
    $posts = Post::whereIn('user_id',$followedUserIds)
        ->with('user') // 投稿者情報を一緒に取得
        ->latest() // created_at の降順
        ->get();

    return view('follows.followList', compact('followedUsers', 'posts'));
}

    public function followerList()
    {
    $userId = Auth::id();

    $followingUserIds = Follow::where('followed_id', $userId)
                             ->pluck('following_id')
                             ->toArray();

    $followingUsers = User::whereIn('id', $followingUserIds)->get();

    $posts = Post::whereIn('user_id',$followingUserIds)
        ->with('user')
        ->latest()
        ->get();

        return view('follows.followerList', compact('followingUsers', 'posts'));
    }

    // 古い処理（残しておいてもOK）
    // public function index()
    // {
    //     $userId = Auth::id();
    //     $followedUsers = User::whereIn(
    //         'id',
    //         Follow::where('follower_id', $userId)->pluck('followed_id')
    //     )->get();
    //     return view('follow_list', ['users' => $followedUsers]);
    // }
}
