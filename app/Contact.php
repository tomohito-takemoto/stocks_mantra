<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'gender', 'body'
    ];
    
    static $genders = [
        '男', '女'
    ];
    
    protected $table = 'contactform';
} 
