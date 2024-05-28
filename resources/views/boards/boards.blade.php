<div class="mt-4">
    @if (isset($boards))
        <ul class="list-none">
            @foreach ($boards as $board)
                <li style="border: 1px solid #e1e8ed; border-radius: 10px; padding: 10px; margin-bottom: 20px;  background-color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                }">
                    <div>
                        <div style= "font-weight: bold;">
                            {{ $board->user_name }}
                            <span style="font-weight: normal;">
                                {{ (new \Carbon\Carbon($board->created_at))->format('Y年m月d日 h:i') }}
                            </span>
                        </div>
                        <!---->
                        <div style= "margin-top: 5px;">
                            {{-- 投稿内容 --}}
                            <p class="mb-0 ">{{ nl2br(e($board->message)) }}</p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: start-flex; margin-left: 10px; margin-top: 10px;">
                        <div>
                        {{-- お気に入り／お気に入り解除ボタン --}}
                        @include('user_favorite.favorite_button', ['id' => $board->message_id])
                        </div>
                         <div style="margin-left: 10px;">
                            @if (Auth::id() == $board->user_number)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('boards.destroy', ['board' => $board->message_id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete id = {{ $board->message_id }} ?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" form color='gray' fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="currentColor" class="size-6" width="25" height="25">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $boards->links() }}
    @endif
</div>