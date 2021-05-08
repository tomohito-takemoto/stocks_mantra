<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    
    /**
     * このユーザに関係する銘柄の件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount(['stocks', 'followings', 'followers', 'favoritings']);
    }
    
    
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $stocks = Stock::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
            'stocks' => $stocks,
        ]);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_following($userId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function follow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // すでにフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }

    /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function unfollow($userId)
    {
        // すでにフォローしているかの確認
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうかの確認
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // すでにフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    /**
     * このユーザがお気に入り中のstock（Stockモデルとの関係を定義）
     */
    public function favoritings()
    {
        return $this->belongsToMany(Stock::class, 'favorites', 'user_id', 'stock_id')->withTimestamps();
    }
    
    public function favorite($stockId)
    {
        $exist = $this->is_favoriting($stockId);
        $its_me = $this->id == $stockId;
        
        if($exist || $its_me) {
            //お気に入りしていれば何もしない
            return false;
        } else {
            //お気に入りしてなければお気に入りする
            $this->favoritings()->attach($stockId);
            return true;
        }
    }
    
    public function unfavorite($stockId)
    {
        $exist = $this->is_favoriting($stockId);
        $its_me = $this->id == $stockId;
        
        if($exist || $its_me) {
            $this->favoritings()->detach($stockId);
            return true;
        } else {
        return false;
        }
    }
    
    public function is_favoriting($stockId)
    {
        // お気に入り中ストックの中に $userIdのものが存在するか
        return $this->favoritings()->where('stock_id', $stockId)->exists();
    }
    
}
