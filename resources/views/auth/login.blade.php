@extends('layouts.logout')

@section('content')

  <h2 class="auth-title">AtlasSNSへようこそ</h2>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="password">パスワード</label>
      <input type="password" id="password" name="password" required>
    </div>


    <div class="form-actions">
      <button type="submit" class="login-button">ログイン</button>
    </div>
  </form>

  <p class="auth-link"><a href="register">新規ユーザーの方はこちら</a></p>

@endsection
