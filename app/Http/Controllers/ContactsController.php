<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

use App\User; // 追加
use App\Stocks; // 追加

class ContactsController extends Controller
{
    public function index()
    {
        // idの値でユーザを検索して取得
        $user = \Auth::user();
        $genders = Contact::$genders;
        
        return view('contact.index', [
            'user' => $user,
        ]);
    }
}
