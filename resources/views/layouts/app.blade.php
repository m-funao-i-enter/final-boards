<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ひとこと掲示板</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>

    <body>
       

        <main class="mt-4">

        </main>
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')


        <div class="container mx-auto">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')
            
        <!-- 成功時のフラッシュメッセージ -->
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        
        <!-- 失敗時のフラッシュメッセージ -->
        @if (session('flash_message_error'))
            <div class="alert alert-danger">
                {{ session('flash_message_error') }}
            </div>
        @endif
            @yield('content')
        </div>

    </body>
</html>