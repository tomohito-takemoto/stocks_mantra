<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Stocks; // 追加

class FavoriteController extends Controller
{
    
    public function store($id)
    {
        //dd($id);
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }


    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    public function showFavorites($id)
    {
        //dd($id);
         // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // お気に入り一覧を取得
        $stocks = $user->favoritings()->paginate(10);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // お気に入り一覧ビューでそれらを表示
        return view('favorite.favorites_list', [
            'user' => $user,
            'stocks' => $stocks,
        ]);
    }
}
