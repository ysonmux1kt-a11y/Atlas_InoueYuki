@extends('layouts.login')

@section('content')

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
      <!-- 左：アイコン -->
      <div class="post-user">
        <img src="{{ asset('images/icon' . $post->user->icon . '.png') }}" alt="アイコン">
      </div>

      <!-- 右：本文ブロック -->
      <div class="post-body">
        <!-- 上部：ユーザー名 + 投稿日時・操作ボタン -->
        <div class="post-head">
          <p class="user-name">{{ $post->user->username }}</p>

          <div class="post-right">
            <div class="top-date">{{ $post->created_at->format('Y/m/d H:i') }}</div>

            @if($post->user_id === Auth::id())
              <div class="post-actions">
                <a href="#" class="edit-button" data-post-id="{{ $post->id }}">
                  <img src="{{ asset('images/edit.png') }}" alt="編集">
                </a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="delete-form">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="delete-button" data-post-id="{{ $post->id }}">
                    <img src="{{ asset('images/trash.png') }}" data-hover="{{ asset('images/trash-h.png') }}" alt="削除">
                  </button>
                </form>
              </div>
            @endif
          </div>
        </div>

        <!-- 投稿本文 -->
        <p class="post-text">{{ $post->content }}</p>

        <!-- 編集モーダル -->
        @if($post->user_id === Auth::id())
          <div class="edit-modal" id="edit-modal-{{ $post->id }}" style="display:none;">
            <div class="edit-modal-content">
              <form action="{{ route('posts.update', $post) }}" method="post" class="edit-form">
                @csrf
                <textarea name="content" rows="4">{{ $post->content }}</textarea>

                <div class="edit-modal-buttons">
                  <button type="button" class="close-modal">キャンセル</button>
                  <button type="submit" class="update-button" aria-label="更新">
                    <img src="{{ asset('images/edit.png') }}" alt="更新">
                  </button>
                </div>
              </form>
            </div>
          </div>
        @endif
      </div>
    </div>
  @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

  document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const postId = this.dataset.postId;
      document.getElementById('edit-modal-' + postId).style.display = 'flex';
    });
  });

  document.querySelectorAll('.close-modal').forEach(button => {
    button.addEventListener('click', function () {
      this.closest('.edit-modal').style.display = 'none';
    });
  });
});
</script>

<!-- 削除確認モーダル -->
  <div class="delete-modal" id="delete-modal" style="display:none;">
    <div class="delete-modal-content">
      <h3>この投稿を削除します。よろしいでしょうか？</h3>

      <form id="delete-form" method="post">
        @csrf
        @method('DELETE')

        <button type="submit" id="confirm-delete">OK</button>
        <button type="button" id="cancel-delete">キャンセル</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded',function(){

      const deleteButtons=document.querySelectorAll('.delete-button');
      const modal=document.getElementById('delete-modal');
      const deleteForm=document.getElementById('delete-form');
      const cancelBtn=document.getElementById('cancel-delete');

      deleteButtons.forEach(button=>{
        button.addEventListener('click',function(){
          const postId=this.dataset.postId;

          deleteForm.action='/posts/' + postId;

          modal.style.display='flex';
        });
      });
      cancelBtn.addEventListener('click',function(e){
        e.preventDefault();
        modal.style.display='none';
      });
    });
  </script>
@endsection
