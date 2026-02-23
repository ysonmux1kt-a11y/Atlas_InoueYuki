@extends('layouts.login')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/pages/user-profile.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="user-profile-page">
<div class="profile-wrapper">

  {{-- =========================
      プロフィール上部（変更なし）
  ========================= --}}
  <div class="profile-header">

    <div class="profile-left">
      <img class="profile-icon"
        src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/icon' . $user->icon . '.png') }}"
        alt="ユーザーアイコン">

      <div class="profile-text">
        <p>
          <span class="label">ユーザー名</span>
          <span class="value">{{ $user->username }}</span>
        </p>

        <p>
          <span class="label">自己紹介</span>
          <span class="value">{{ $user->bio ?? '自己紹介は未設定です。' }}</span>
        </p>
      </div>
    </div>

    <div class="profile-action">
      @if(auth()->id() !== $user->id)
        @if($isFollowing)
          <form action="{{ route('unfollow', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="follow-btn follow-remove">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="follow-btn follow-add">フォローする</button>
          </form>
        @endif
      @endif
    </div>

  </div>

  <div class="profile-divider"></div>

  {{-- =========================
      投稿一覧（ここから構造変更）
  ========================= --}}
  <div class="profile-posts">
    <div class="post-list">

      @foreach($posts as $post)
        <div class="post-item">

          <div class="post-inner">
            <!-- 左：アイコン -->
            <div class="post-user">
              <img
          src="{{ $post->user->icon_image
            ? asset('storage/' . $post->user->icon_image)
            : asset('images/icon' . $post->user->icon . '.png') }}"
          alt="ユーザーアイコン">
            </div>

            <!-- 右：本文ブロック -->
            <div class="post-body">

              <!-- 上段：ユーザー名 ＋ 投稿日時 -->
              <div class="post-head">
                <p class="post-user-name">{{ $post->user->username }}</p>
                <p class="top-date">{{ $post->created_at->format('Y-m-d H:i') }}</p>
              </div>

              <!-- 下段：本文 -->
              <div class="post-content">
                <p class="post-text">{{ $post->content }}</p>
              </div>

            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>

  </div>
</div>

@endsection
