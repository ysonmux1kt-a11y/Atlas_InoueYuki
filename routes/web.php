<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 認証系ルート（login / register / logout）
require __DIR__ . '/auth.php';

// ログイン
// Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//     ->name('login');

/*
|--------------------------------------------------------------------------
| ログイン後のみアクセス可能なページ
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ユーザー登録完了画面
    Route::get('/added', [RegisteredUserController::class, 'added'])
        ->name('added');


    // トップページ
    Route::get('/top', [PostsController::class, 'index'])
        ->name('top');

    // 投稿登録
    Route::post('/top', [PostsController::class, 'store'])
        ->name('posts.store');

    // 投稿編集
    Route::post('/posts/{post}',[PostsController::class,'update'])
        ->name('posts.update');

    // 投稿削除
    Route::delete('/posts/{post}',[PostsController::class,'destroy'])
        ->name('posts.destroy');

    // プロフィール
    Route::get('/profile', [ProfileController::class, 'profile'])
        ->name('profile');

    // ユーザー検索（検索機能は後で実装）
    Route::get('/search', [UsersController::class, 'search'])
        ->name('user.search');

    // フォロー / フォロワー一覧
    // Route::get('/follow-list', [PostsController::class, 'index'])
    //     ->name('follow-list');
    // Route::get('/follower-list', [PostsController::class, 'index'])
    //     ->name('follower-list');

    // フォロー・アンフォロー
    Route::post('follow/{user}',[UsersController::class,'follow'])
        ->name('follow');
    Route::post('unfollow/{user}',[UsersController::class,'unfollow'])
        ->name('unfollow');

    // フォローリスト
        Route::get('/follow-list', [FollowsController::class, 'followList'])
        ->name('follow-list');

    // フォロワーリスト
        Route::get('/follower-list', [FollowsController::class, 'followerList'])
        ->name('follower-list');

    // 他ユーザーのプロフィール
    Route::get('/user/{id}', [UsersController::class, 'show']);
});
