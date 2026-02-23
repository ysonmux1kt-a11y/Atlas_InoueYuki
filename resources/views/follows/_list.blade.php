<div class="follow-list">

  <div class="follow-main">

    <div class="follow-header">
      <h2 class="follow-title">{{ $title }}</h2>

      <div class="follower-icons">
        @foreach($users as $user)
        <a href="{{ url('/user/' . $user->id) }}">
          <img src="{{ $user->icon_image
        ? asset('storage/' . $user->icon_image)
        : asset('images/icon' . $user->icon . '.png') }}">
        </a>
        @endforeach
      </div>
    </div>

    <!-- 太線は必ずメイン内 -->
    <div class="section-divider"></div>

    <div class="post-list">
    @foreach($posts as $post)
    <div class="post">
      <div class="post-inner">

        <div class="post-user-icon">
          <img src="{{ $post->user->icon_image
              ? asset('storage/' . $post->user->icon_image)
              : asset('images/icon' . $post->user->icon . '.png') }}">
        </div>

        <div class="post-body">
          <div class="post-head">
            <p class="post-user-name">{{ $post->user->username }}</p>
            <p class="post-time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
          </div>

          <p class="post-text">{{ $post->content }}</p>
        </div>

      </div>
    </div>
    @endforeach
  </div>

  </div><!-- /.follow-main -->

</div><!-- /.follow-list -->
