<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $fillable = [
        'symbol', 'year', 'period', 'estimate', 'reported'
        ];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * ユーザからお気に入りされているstock（Userモデルとの関係を定義）
     */
    public function favoriteds()
    {
        return $this->belongsToMany(User::class, 'favorites', 'stock_id', 'user_id')->withTimestamps();
    }
}
