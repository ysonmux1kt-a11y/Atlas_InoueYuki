@extends('layouts.login') {{-- 例：ログイン後レイアウト --}}

@section('content')

@php
  // 自分がフォローしているユーザーID一覧
  $followIds= Auth::user()->follows->pluck('id')->toArray();
@endphp

<div class="user-search">

  <form action="{{ route('user.search') }}" method="GET" class="user-search-form">
    <input
      type="text"
      name="keyword"
      value="{{ request('keyword') }}"
      class="user-search-input"
      placeholder="ユーザー名"
    >

    <button type="submit" class="user-search-btn" aria-label="検索">
      <img src="{{ asset('images/search.png') }}" alt="検索">
    </button>

    @if(!empty($keyword))
        <p class="search-word">
            「{{ $keyword }}」の検索結果
        </p>
    @endif

  </form>

  <div class="search-underline"></div>

  {{-- 一覧表示 --}}
  <div class="user-list">
    @forelse($users as $user)
    <div class="user-item">

      {{-- 左：アイコン＋ユーザー名 --}}
        <div class="user-icon">
          <img src="{{ asset('images/icon' . $user->icon . '.png') }}" alt="ユーザーアイコン">
        </div>

        <div class="user-name">
          {{ $user->username }}
        </div>

      {{-- 右：フォローボタン --}}
        <div class="user-right">
        @if(in_array($user->id,$followIds))
          {{-- フォロー済み：フォロー解除（赤） --}}
          <form action="{{ route('unfollow',$user) }}" method="post">
            @csrf
            <button type="submit" class="btn-unfollow">フォロー解除</button>
          </form>
        @else
          {{-- 未フォロー：フォローする（青） --}}
          <form action="{{ route('follow',$user) }}" method="post">
            @csrf
            <button type="submit" class="btn-follow">フォローする</button>
          </form>
        @endif
        </div>
    </div>

      @empty
      <p class="no-users">該当するユーザーがいません。</p>
      @endforelse
  </div>

</div>
@endsection
