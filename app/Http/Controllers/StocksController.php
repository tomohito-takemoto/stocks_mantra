<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Stock; // 追加
use App\Report;

class StocksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $stocks = $user->stocks()->orderBy('created_at', 'desc')->paginate(10);
            //dd($user->stocks()->first());
            $data = [
                'user' => $user,
                'stocks' => $stocks,
            ];
        
            if( !$user->stocks()->first() ){
                return redirect()->route('stock_add');
            }
            
            return view('stocks.index', $data);
        
        } else {
            return view('welcome');
        }
    }
    
    public function store(Request $request)
    {

        $stock = New Stock();
        
        $request->validate([
            'symbol' => 'required|max:4',
        ]);
        
        $stock = $request->user()->stocks()->create([
            'symbol' => $request->symbol,
        ]);
        
        //dd($stock);
        return view('reports.report', ['stock' => $stock, 'id' => $stock->id]);
    }
    
    public function destroy($id)
    {
        //dd($id);
        //idの値で投稿を検索して取得
        $stock = \App\Stock::findOrFail($id);
        
        //dd($stock);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $stock->user_id) {
            
            $stock->delete();
            //dd('111');
            
        }

        // 前のURLへリダイレクトさせる
        return redirect('stocks');
        //return redirect()->route('stocks.show', ['stock' => $stock->id]);
    }
    
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $stock = Stock::find($id);
        
        //dd($stock);
        
        if(!$stock){
            return view('stocks.newregister');
        }
        
        //$user = \Auth::user();
        $user = User::findOrFail($stock->user_id);
        $stocks = $user->stocks()->where('symbol', $stock->symbol)->orderBy('year', 'desc')->orderBy('period', 'desc')->paginate(5);
        
        $data = [
            'user' => $user,
            'stocks' => $stocks,
        ];

        // メッセージ詳細ビューでそれを表示
        return view('stocks.show', [
            'stock' => $stock,
            'stocks' => $stocks,
        ]);
    }
    
    public function edit(Request $request)
    {
        //dd($request);
        $user = \Auth::user();
        $stock = Stock::find($request->id);
        $stocks = $user->stocks();
        
        //dd($stock);
        return view('stocks.edit', ['stock' => $stock, 'stocks' => $stocks]);
    }
    
    public function update(Request $request)
    {
        
        //dd($request);
        $stock = Stock::find($request->id);
        $report->year = $request->stock_year;
        $report->period = $request->stock_period;
        $report->estimate = $request->stock_estimate;
        $report->reported = $request->stock_reported;
        //dd($report);
        $stock->save();
        
        //dd($stock);
        return redirect('stocks/' . $stock->id);
    }
    
    public function show_add()
    {
        return view('stocks.newregister');
    }
    
    
    public function create(Request $request) {
        
        $user = \Auth::user();
        $stock = Stock::find($request->id);
        $stocks = $user->stocks();
        
        //dd($request);
        //dd($stock);
        
        return view('stocks.newregister', [
            'stock' => $stock,
            'stocks' => $stocks
        ]);
    }
}
