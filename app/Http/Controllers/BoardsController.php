<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Board;
use DB;
class BoardsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // テーブル結合（join）
            $boards = DB::table('board')
                    ->join('users', 'board.user_number', '=', 'users.id')
                    ->where('board.delete_flag', 0)
                    ->select('board.*', 'users.user_name')
                    ->orderBy('board.created_at', 'desc')
                    ->paginate(5);
            $data = [
                'user' => $user,
                'boards' => $boards,
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
        
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'message' => 'required|max:128',
            'user_name' => 'required|max:32',
        ]);
        
        // 認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->boards()->create([
            'user_name' => $request->user_name,
            'message' => $request->message,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy(string $message_id)
    {
        // message_idの値で投稿を検索して取得
        $board = Board::where('message_id', $message_id)->firstOrFail();
        
        // 認証済みユーザー（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $board->user_number) {
            $board->delete_flag=1;
            $board->save();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
    
    public function show($id)
    {
        // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザーの投稿一覧を作成日時の降順で取得
        $boards = $user->boards()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザー詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'boards' => $boards
        ]);
    }
}
