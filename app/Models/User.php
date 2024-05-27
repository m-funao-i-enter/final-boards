<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * このユーザーが所有する投稿。（ Userモデルとの関係を定義）
     */
    public function boards()
    {
        return $this->hasMany(Board::class, 'user_number');
    }
        /**
     * このユーザーに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['boards', 'favorites']);
    }
        /**
     * このユーザーがfavoriteした投稿。
     */
    public function favorites()
    {
        return $this->belongsToMany(Board::class, 'favorites', 'user_number', 'message_id')->withTimestamps();
    }

    /**
     * $favoriteIdで指定された投稿をお気に入りする。
     *
     * @param  int  $favoriteId
     * @return bool
     */
    public function favorite(int $favoriteId)
    {
        $exist = $this->is_favorite($favoriteId);
        if($exist){
            return false;
        }
        else{
            $this->favorites()->attach($favoriteId);
            return true;
        }
    }
    
    /**
     * $toFavoritesで指定された投稿をお気に入り解除する。
     * 
     * @param  int $FavoriteId
     * @return bool
     */
    public function unfavorite(int $favoriteId)
    {
        $exist = $this->is_favorite($favoriteId);
        if($exist){
            $this->favorites()->detach($favoriteId);
            return true;
        }
        else{
            return false;
        }
    }
    
    /**
     * 指定された$favoriteIdの投稿がお気に入り登録済みか調べる。
     * 
     * @param  int $favoriteId
     * @return bool
     */
    public function is_favorite(int $favoriteId)
    {
        return $this->favorites()->where('favorites.message_id', $favoriteId)->exists();
    }
    
    /**
     * このユーザーのお気に入りした投稿に絞り込む。
     */
    public function feed_favorites()
    {
        // このユーザーお気に入りした投稿を取得して配列にする
        $FavoriteId = $this->pluck('favorites')->toArray();
        // それらのユーザーが所有する投稿に絞り込む
        return Board::whereIn($favoriteId);
    }
}

