<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMail;

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
    
    public function confirm(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'gender' => 'required',
            'body' => 'required',
        ]);
        
        $inputs = $request->all();
        //dd($request->all());
        return view('contact.confirm', ['inputs' => $inputs]);
    }
    
    public function process(Request $request)
    {
        //dd($request->all());
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if($action === 'submit') {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            // メール送信
            Mail::to($input['email'])->send(new ContactMail('mails.contact', 'お問い合わせありがとうございます', $input));

            return redirect()->route('complete');
            
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }
    
    public function complete()
    {
        return view('contact.complete');
    }
}
