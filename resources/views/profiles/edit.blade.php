@extends('layouts.login')

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/pages/profile-edit.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="profile-edit-page">

<div class="profile-edit-wrapper">

  <!-- <h2>プロフィール編集</h2> -->

  @if(session('success'))
  <p class="success">{{ session('success') }}</p>
  @endif

  <div class="edit-area">

    <div class="edit-icon">
      <img class="profile-icon"
      src="{{ $user->icon_image ? asset('storage/' . $user->icon_image) : asset('images/icon' . $user->icon . '.png') }}"
      alt="ユーザーアイコン">
    </div>

    <div class="edit-form">

      <form action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data">
        @csrf

        {{-- ユーザー名 --}}
        <div class="form-group">
          <label for="username">ユーザー名</label>
          <input type="text"
                 id="username"
                 name="username"
                 value="{{ old('username', $user->username) }}">
        </div>
        @error('username')
          <p class="error">{{ $message }}</p>
        @enderror

        {{-- メールアドレス --}}
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email"
                 id="email"
                 name="email"
                 value="{{ old('email', $user->email) }}">
        </div>
        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror

        {{-- パスワード --}}
        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password"
                 id="password"
                 name="password">
        </div>
        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror

        {{-- パスワード確認 --}}
        <div class="form-group">
          <label for="password_confirmation">パスワード確認</label>
          <input type="password"
                 id="password_confirmation"
                 name="password_confirmation">
        </div>

        {{-- 自己紹介 --}}
        <div class="form-group">
          <label for="bio">自己紹介</label>
          <textarea id="bio"
                    name="bio">{{ old('bio', $user->bio) }}</textarea>
        </div>
        @error('bio')
          <p class="error">{{ $message }}</p>
        @enderror

        {{-- アイコン画像 --}}
        <div class="form-group file-group">
          <label for="icon_image">アイコン画像</label>
          <input type="file"
                 id="icon_image"
                 name="icon_image">
        </div>
        @error('icon_image')
          <p class="error">{{ $message }}</p>
        @enderror

        <div class="form-submit">
          <button type="submit" class="update-btn">更新</button>
        </div>

      </form>

    </div>

  </div>

</div>
</div>

@endsection
