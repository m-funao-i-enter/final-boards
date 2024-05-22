<div class="mt-4">
    @if (isset($boards))
        <ul class="list-none">
            @foreach ($boards as $board)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($board->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($board->content)) !!}</p>
                        </div>
                         <div>
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('boards.destroy', $board->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                                        onclick="return confirm('Delete id = {{ $board->id }} ?')">Delete</button>
                                </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $boards->links() }}
    @endif
</div>