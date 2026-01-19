<x-login-layout>

<!-- 投稿フォーム -->
<div class="post form">
  <form action="{{ route('posts.store') }}" method="post">
    @csrf

    <div class="post-form-inner">
      <!-- ユーザーアイコン -->
      <div class="post-user-icon">
        <img src="{{ asset('images/icon' . Auth::user()->icon . '.png') }}"
        alt="ユーザーアイコン">
      </div>

      <!-- 投稿入力エリア -->
        <div class="post-input-area">
          <textarea name="content"  rows="3" placeholder="投稿内容を入力してください"></textarea>

          <!-- 投稿ボタン（後でXD画像差し替え） -->
           <button type="submit" class="post-submit-btn">
            <img src="{{ asset('images/post.png')}}" alt="投稿"></button>
        </div>
    </div>
  </form>
</div>
</x-login-layout>
