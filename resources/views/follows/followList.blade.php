@extends('layouts.login')

@section('content')

<h2>フォローリスト</h2>

{{-- アイコン一覧（上部） --}}
<div class="follower-icons">
    @foreach($followedUsers as $followedUser)
        <a href="{{ url('/user/' . $followedUser->id) }}">
            <img src="{{ asset('storage/'.$followedUser->icon_image) }}"
                 alt="{{ $followedUser->username }}"
                 class="user-icon">
        </a>
    @endforeach
</div>

{{-- 投稿一覧 --}}
<div class="post-list">
  @foreach ($posts as $post)
    <div class="post-card">
      <div class="post-left">
        <a href="{{ url('/user/'.$post->user->id) }}">
            <img src="{{ asset('storage/'.$post->user->icon_image) }}"
                 alt="{{ $post->user->username }}"
                 class="user-icon">
        </a>
      </div>
      <div class="post-body">
        <div class="post-user">{{ $post->user->username }}</div>
        <div class="post-content">{{ $post->content }}</div>
      </div>
      <div class="post-date">
        {{ $post->created_at->format('Y-m-d H:i') }}
      </div>
    </div>
  @endforeach
</div>

@endsection
