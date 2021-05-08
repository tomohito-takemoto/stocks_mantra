<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Stock;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $user = \Auth::user();
        //$id = Auth::user()->id;
        //$user = User::findOrFail($id);

        
        return view('users.index', [
            'users' => $users,
            'user' => $user,
        ]);
    }
    
    public function store(Request $request)
    {
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
        $user = User::findOrFail($id);
        $stock = Stock::find($id);
        $stocks = $user->stocks()->orderBy('created_at', 'desc')->paginate(10);
        
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
