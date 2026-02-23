        <div id="head">
            <!-- ロゴ -->
            <h1>
                <a href="{{ route('top') }}">
                <img src="{{ asset('images/atlas.png') }}"></a>
                <!-- <a><img src="images/atlas.png"></a> -->
            </h1>

            <!-- アコーディオン全体 -->
            <div class="accordion">
            <!-- クリック部分 -->
                <div class="accordion-btn">
                    <p class="header-username">{{ Auth::user()->username }} さん</p>
                    <span class="chevron"></span>
                    <img class="header-icon"
                    src="{{ Auth::user()->icon_image ? asset('storage/' . Auth::user()->icon_image) : asset('images/icon' . Auth::user()->icon . '.png') }}"
                    alt="ユーザーアイコン">
                </div>
            <!-- 開閉メニュー -->
                <ul class="accordion-menu">
                    <li><a href="{{ route('top') }}">ホーム</a></li>
                    <li><a href="{{ route('profile.edit') }}">プロフィール</a></li>
                    <li><form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                        ログアウト
                        </button>
                        </form></li>
                </ul>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const btn = document.querySelector('.accordion-btn');
                const menu = document.querySelector('.accordion-menu');
                const arrow = document.querySelector('.arrow');

                 if (!btn) return; // 念のための安全対策

                btn.addEventListener('click', function () {
                menu.classList.toggle('open');
                btn.classList.toggle('active');
                });
            });
        </script>
