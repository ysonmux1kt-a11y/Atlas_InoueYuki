<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followerList()
{
    $user = Auth::user();

    // フォロワー一覧
    $followers = $user->followers;

    // フォロワーの投稿一覧（新しい順）
    $posts = Post::whereIn(
        'user_id',
        $followers->pluck('id')
    )->latest()->get();

    return view(
        'follows.followerList',
        compact('followers', 'posts')
    );
}


    public function followList()
{
    $user = Auth::user();

    $followedUsers = $user->follows;

    $posts = Post::whereIn(
        'user_id',
        $followedUsers->pluck('id')
    )->latest()->get();

    return view(
        'follows.followList',
        compact('followedUsers', 'posts')
    );
}
}
