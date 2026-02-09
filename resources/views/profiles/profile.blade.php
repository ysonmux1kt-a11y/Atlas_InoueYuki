@extends('layouts.login')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ time() }}">
@endsection

@section('content')
<div class="profile-wrapper">
  <div class="profile-header">
    <div class="profile-left">
      <img class="profile-icon"
        src="{{ asset('images/icon' . $user->icon . '.png') }}"
        alt="ユーザーアイコン"
      >
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


    <!-- 右側：フォローボタン -->
    <div class="profile-action">

      {{-- 自分のプロフィールにはボタンを出さない --}}
      @if(auth()->id() !== $user->id)

        @if($isFollowing)
          <form action="{{ route('unfollow', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="follow-btn follow-remove">
              フォロー解除
            </button>
          </form>
        @else
          <form action="{{ route('follow', $user->id) }}" method="POST">
            @csrf
            <button type="submit" class="follow-btn follow-add">
              フォローする
            </button>
          </form>
        @endif

      @endif

    </div>

  </div>

</div>
@endsection
