<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Stocks; // 追加

class UsersController extends Controller
{
    public function create(Request $request) {
        
        $user = \Auth::user();
        $stock = Stocks::find($request->id);
        $stocks = $user->stocks();
        
        return view('stocks.newregister',[
            'stock' => $stock,
            'stocks' => $stocks
        ]);
    }
    
}
