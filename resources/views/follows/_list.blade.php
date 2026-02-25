<div class="follow-list">

  <div class="follow-main">

    <div class="follow-header">
      <h2 class="follow-title">{{ $title }}</h2>

      <div class="follower-icons">
        @forelse($users as $user)
          <a href="{{ url('/user/' . $user->id) }}">
            <img
              src="{{ $user->icon_image
                ? asset('storage/' . $user->icon_image)
                : asset('images/icon' . $user->icon . '.png') }}"
              alt="ユーザーアイコン"
            >
          </a>
        @empty
          <p class="no-user">該当ユーザーはいません。</p>
        @endforelse
      </div>
    </div>

    <!-- 区切り線 -->
    <div class="section-divider"></div>

    <!-- 投稿一覧 -->
    <div class="post-list">

      @forelse($posts as $post)
        <div class="post">
          <div class="post-inner">

            <div class="post-user-icon">
              <img
                src="{{ optional($post->user)->icon_image
                  ? asset('storage/' . optional($post->user)->icon_image)
                  : asset('images/icon1.png') }}"
                alt="ユーザーアイコン"
              >
            </div>

            <div class="post-body">
              <div class="post-head">
                <p class="post-user-name">
                  {{ optional($post->user)->username ?? '不明なユーザー' }}
                </p>
                <p class="post-time">
                  {{ $post->created_at->format('Y-m-d H:i') }}
                </p>
              </div>

              <p class="post-text">{{ $post->content }}</p>
            </div>

          </div>
        </div>
      @empty
        <p class="no-post">表示できる投稿がありません。</p>
      @endforelse

    </div><!-- /.post-list -->

  </div><!-- /.follow-main -->

</div><!-- /.follow-list -->
