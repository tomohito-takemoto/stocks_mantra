<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Stocks; // 追加

class UsersController extends Controller
{
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'year' => 'required|max:4',
            'period' => 'required|max:1',
            'estimate' => 'required|max:5',
            'reported' => 'required|max:5',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->stocks()->create([
            'year' => $request->year,
            'period' => $request->period,
            'estimate' => $request->estimate,
            'reported' => $request->reported,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        $stock = Stocks::find($id);
        $stocks = $user->stocks()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ詳細ビューでそれを表示
        return view('users.users_show', [
            'user' => $user,
            'stock' => $stock,
            'stocks' => $stocks,
        ]);
    }
    
    public function followings($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followings = $user->followings()->paginate(10);
        
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    public function followers($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $followers = $user->followers()->paginate(10);

        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
}
