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

          <!-- 投稿ボタン -->
           <button type="submit" class="post-submit-button">
            <img src="{{ asset('images/post.png')}}" alt="投稿"></button>
        </div>
    </div>
  </form>
</div>

<!-- 投稿一覧 -->
<div class="post-list">
  @foreach($posts as $post)
  <div class="post-item">

    <!-- 投稿内容 -->
    <p class="post-text">{{ $post->content }}</p>

    <!-- 編集アイコン（自分の投稿のみ） -->
    @if($post->user_id === Auth::id())
      <div class="post-edit">
        <a href="#" class="edit-button" data-post-id="{{ $post->id }}">
          <img src="{{ asset('images/edit.png') }}" alt="編集">
        </a>
      </div>

      <!-- 編集モーダル（最初は非表示） -->
      <div class="edit-modal" id="edit-modal-{{ $post->id }}" style="display:none;">
        <div class="edit-modal-content">
          <h3>投稿を編集</h3>

          <form action="{{ route('posts.update',$post) }}" method="post" class="edit-form">
            @csrf
            <textarea name="content" rows="4">{{ $post->content }}</textarea>

            <div class="edit-modal-buttons">
              <button type="button" class="close-modal">キャンセル</button>
              <button type="submit">更新</button>
            </div>
          </form>
        </div>
      </div>

    @endif

  </div>
  @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

  document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const postId = this.dataset.postId;
      document.getElementById('edit-modal-' + postId).style.display = 'block';
    });
  });

  document.querySelectorAll('.close-modal').forEach(button => {
    button.addEventListener('click', function () {
      this.closest('.edit-modal').style.display = 'none';
    });
  });
});
</script>

</x-login-layout>
