<x-logout-layout>
    <!-- 適切なURLを入力してください -->
<!-- {!! Form::open(['url' => 'register']) !!} -->

<h2>新規ユーザー登録</h2>

<form action="/register" method="POST">
    @csrf

    <input type="text" name="username" class="input">
    <input type="email" name="email" class="input">
    <input type="password" name="password" class="input">
    <input type="password" name="password_confirmation" class="input">

    <button type="submit">登録</button>
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

<p><a href="login">ログイン画面へ戻る</a></p>

<!-- {!! Form::close() !!} -->


</x-logout-layout>
