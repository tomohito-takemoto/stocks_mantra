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
        return $this->hasMany(Stocks::class);
    }
    
    /**
     * このユーザに関係する銘柄の件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('stocks');
    }
    
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $stocks = Stocks::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
            'stocks' => $stocks,
        ]);
    }
}
