@extends('layouts.login')

@section('content')

<h2>フォロワーリスト</h2>

{{-- アイコン一覧（上部） --}}
<div class="follower-icons">
    @foreach($followingUsers as $followingUser)
        <a href="{{ url('/user/' . $followingUser->id) }}">
            <img src="{{ asset('storage/'.$followingUser->icon_image) }}"
                 alt="{{ $followingUser->username }}"
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
