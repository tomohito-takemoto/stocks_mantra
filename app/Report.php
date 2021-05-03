<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'year', 'period', 'estimate', 'reported'
        ];
        
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
