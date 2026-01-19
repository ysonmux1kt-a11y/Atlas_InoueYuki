<div id="side-bar">
      <div id="confirm">
        <p>{{ Auth::user()->username }} さんの</p>
        <div>
          <p>フォロー数</p>
          <p>{{ Auth::user()->follows()->count() }} 名</p>
        </div>
        <p class="btn"><a href="{{ route('follow-list') }}">フォローリスト</a></p>
        <div>
          <p>フォロワー数</p>
          <p>{{ Auth::user()->followers()->count() }} 名</p>
        </div>
        <p class="btn"><a href="{{ route('follower-list') }}">フォロワーリスト</a></p>
      </div>
      <p class="btn"><a href="{{ route('user.search') }}">ユーザー検索</a></p>
    </div>
