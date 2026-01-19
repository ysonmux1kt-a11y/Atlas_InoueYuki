<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 認証系ルート（login / register / logout）
require __DIR__ . '/auth.php';

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

    // プロフィール
    Route::get('/profile', [ProfileController::class, 'profile'])
        ->name('profile');

    // ユーザー検索（検索機能は後で実装）
    Route::get('/search', [UsersController::class, 'search'])
        ->name('user.search');

    // フォロー / フォロワー一覧
    Route::get('/follow-list', [PostsController::class, 'index'])
        ->name('follow-list');
    Route::get('/follower-list', [PostsController::class, 'index'])
        ->name('follower-list');

    // 他ユーザーのプロフィール
    Route::get('/user/{id}', [UsersController::class, 'show']);
});
