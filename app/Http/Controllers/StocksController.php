<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Stocks; // 追加

class StocksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $stocks = $user->stocks()->orderBy('created_at', 'desc')->paginate(10);
            //dd($user->stocks()->first());
            $data = [
                'user' => $user,
                'stocks' => $stocks,
            ];
        
            if( !$user->stocks()->first() ){
                //dd('111');
                return redirect()->route('stock_add');
            }
            
        // マイページでそれらを表示
        return view('stocks.index', $data);
        
        } else {
            return view('welcome');
        }
    }
    
    public function store(Request $request)
    {
        $stock = Stocks::find($request->id);

        // ストックの中身が無い場合
        if(is_null($stock)) {
            //dd($request);
            // バリデーション
            $request->validate([
                'symbol' => 'required|max:4',
                'year' => 'required|max:4',
                'period' => 'required|max:1',
                'estimate' => 'required|max:5',
                'reported' => 'required|max:5',
            ]);
            
            $stock=$request->user()->stocks()->create([
                'symbol' => $request->symbol,
                'year' => $request->year,
                'period' => $request->period,
                'estimate' => $request->estimate,
                'reported' => $request->reported,
            ]);
            
            //dd($stock->id);
            // 前のURLへリダイレクトさせる
            //return redirect()->route('stocks.store', ['stock' => $stock, 'symbol' => $stock->symbol]);
            //return redirect()->route('stocks.store');
            //return redirect()->route('stocks.show', $request->id);
            //dd($request->id);
            return redirect()->route('stocks.show', ['stock' => $stock->id]);
            //return redirect()->action( [StocksController::class, 'show'], ['stock' => $request->id]);
            //return back();
        
        // ストックの中身がある場合   
        } else {
            dd($request);
            
            // バリデーション
            $request->validate([
                //'symbol' => 'required|max:4',
                'year' => 'required|max:4',
                'period' => 'required|max:1',
                'estimate' => 'required|max:5',
                'reported' => 'required|max:5',
            ]);
            
            $stock=$request->user()->stocks()->create([
                'year' => $request->year,
                'period' => $request->period,
                'estimate' => $request->estimate,
                'reported' => $request->reported,
            ]);
            //dd($request);
            //return redirect()->route('stocks_addto', [$request->symbol]);
            return redirect()->route('stocks.show', ['stock' => $stock->id]);
        }
        
        
    }
    
    public function destroy($id)
    {
        //dd($id);
        //idの値で投稿を検索して取得
        $stock = \App\Stocks::findOrFail($id);
        
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
        $stock = Stocks::find($id);
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
        $stock = Stocks::find($request->id);
        $stocks = $user->stocks();
        
        //dd($stock);
        return view('stocks.edit', ['stock' => $stock, 'stocks' => $stocks]);
    }
    
    public function update(Request $request)
    {
        
        //dd($request);
        $stock = Stocks::find($request->id);
        $stock->year = $request->stock_year;
        $stock->period = $request->stock_period;
        $stock->estimate = $request->stock_estimate;
        $stock->reported = $request->stock_reported;
        //dd($stock);
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
        $stock = Stocks::find($request->id);
        $stocks = $user->stocks();
        
        //dd($request);
        //dd($stock);
        
        return view('stocks.newregister', [
            'stock' => $stock,
            'stocks' => $stocks
        ]);
    }
}
