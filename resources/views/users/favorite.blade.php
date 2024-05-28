
<div class="tabs tabs-lifted">
    {{-- お気に入り一覧タブ --}}
    <class="tab grow {{ Request::routeIs('users.favorites') ? 'tab-active' : '' }}" style="color: #6c757d; text-decoration: none; font-weight: bold;">
        Favorites
        <div class="badge badge-neutral ml-1">{{ $counter}}</div>
    </a>
</div>

<div class="mt-4">
    @if (isset($favorites))
        <ul class="list-none">
            @foreach ($favorites as $favorite)
                    <div>
                        <li style="border: 1px solid #e1e8ed; border-radius: 10px; padding: 10px; margin-bottom: 20px;  background-color: #fff;
                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                        }">
                        <div style= "font-weight: bold;">
                            {{ $favorite->user->user_name }}
                            <span style="font-weight: normal;">
                            {{ (new \Carbon\Carbon($favorite->created_at))->format('Y年m月d日 h:i') }}
                            </span>
                        </div>
                        <!---->
                        <div style= "margin-top: 5px;">
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{{ nl2br(e($favorite->message)) }}</p>
                        </div>
                        <div style="display: flex; justify-content: start-flex; margin-top: 10px;">
                        {{-- お気に入り／お気に入り解除ボタン --}}
                        @include('user_favorite.favorite_button', ['id' => $favorite->message_id])
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
