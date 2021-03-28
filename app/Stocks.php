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
}
