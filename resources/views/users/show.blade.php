@extends('layouts.app')

@section('message')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザー情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- 投稿フォーム --}}
            @include('boards.form')
            {{-- 投稿一覧 --}}
            @include('boards.microposts')
        </div>
    </div>
@endsection
