@extends('layouts.app')

@section('content')
<div class="mt-4">
    @if (isset($favorites))
        <ul class="list-none">
            @foreach ($favorites as $favorite)
                    <div>
                        <div>
                            {{ $favorite->user_number }}
                            {{ (new \Carbon\Carbon($favorite->created_at))->format('Y年m月d日 h:i') }}
                        </div>
                        <!---->
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{{ nl2br(e($favorite->message)) }}</p>
                        </div>
                        <div>
                        {{-- お気に入り／お気に入り解除ボタン --}}
                        @include('user_favorite.favorite_button', ['id' => $favorite->message_id])
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection