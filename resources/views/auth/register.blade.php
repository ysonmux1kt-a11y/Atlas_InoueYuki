@extends('layouts.logout')

@section('content')

<h2 class="auth-title">新規ユーザー登録</h2>

<form action="/register" method="POST" class="auth-form">
    @csrf

    {{-- バリデーションエラー一覧 --}}
    <!-- @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <div class="form-group">
        <label for="username">ユーザー名</label>
        <input id="username" type="text" name="username" value="{{ old('username') }}" required minlength="2" maxlength="12">

        @error('username')
          <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required minlength="5"
        maxlength="40">

        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password" required minlength="8" maxlength="20">

        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">パスワード確認</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required minlength="8" maxlength="20">

        @error('password_confirmation')
          <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-actions">
      <button type="submit" class="login-button">登録</button>
    </div>
</form>

<p class="auth-link"><a href="{{ route('login') }}">ログイン画面へ戻る</a></p>


@endsection
