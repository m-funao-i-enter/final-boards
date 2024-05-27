<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * 投稿をお気に入りするアクション。
     *
     * @param  $favoriteId お気に入り一覧
     * @return \Illuminate\Http\Response
     */
    public function store(string $message_id)
    {
        // 認証済みユーザー（閲覧者）が、投稿をお気に入りする
        \Auth::user()->favorite(intval($message_id));
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * 投稿をお気に入り解除するアクション。
     *
     * @param  $favoriteId お気に入り一覧
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $message_id)
    {
        // 認証済みユーザー（閲覧者）が、投稿をお気に入り解除する
        \Auth::user()->unfavorite(intval($message_id));
        // 前のURLへリダイレクトさせる
        return back();
    }
}
