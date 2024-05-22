<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    
    protected $fillable = ['message'];

    /**
    * この投稿を所有するユーザー。（ Userモデルとの関係を定義）
    */
    /**
    * モデルと関連しているテーブル
    *
    * @var string
    */
    protected $table = 'board'; // ここで任意の名前を設定
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_number');
    }
}
