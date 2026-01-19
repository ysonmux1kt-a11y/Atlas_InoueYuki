<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  <!-- {!! Form::open(['url' => 'login']) !!} -->

  <p>AtlasSNSへようこそ</p>

  <form action="/login" method="POST">
    @csrf

    <input type="email" name="email">
    <input type="password" name="password">

    <button type="submit">ログイン</button>
</form>

  <!-- {{ Form::label('email') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン') }} -->

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  <!-- {!! Form::close() !!} -->

</x-logout-layout>
