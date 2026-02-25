@extends('layouts.logout')

@section('content')

    <p class="added-name">{{ $username }}さん</p>
    <p class="added-welcome">ようこそ！AtlasSNSへ！</p>
    <p class="added-message">ユーザー登録が完了しました。<br>早速ログインをしてみましょう。</p>

    <div class="form-actions">
     <a href="/login" class="login-button added-button">ログイン画面へ</a>
    </div>

@endsection
