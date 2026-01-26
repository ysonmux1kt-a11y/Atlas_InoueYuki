@extends('layouts.logout')

@section('content')

    <!-- 適切なURLを入力してください -->
<!-- {!! Form::open(['url' => 'register']) !!} -->

<h2 class="auth-title">新規ユーザー登録</h2>

<form action="/register" method="POST" class="auth-form">
    @csrf

    <div class="form-group">
        <label for="username">ユーザー名</label>
        <input id="username" type="text" name="username">
    </div>

    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input id="email" type="email" name="email">
    </div>

    <div class="form-group">
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">パスワード確認</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
    </div>

    <div class="form-actions">
      <button type="submit" class="login-button">登録</button>
    </div>
</form>
<!-- {{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }} -->

<!-- {{ Form::submit('登録') }} -->

<p class="auth-link"><a href="login">ログイン画面へ戻る</a></p>

<!-- {!! Form::close() !!} -->


@endsection
