<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Stock;
use App\Report;
use App\Http\StocksController;

class ReportsController extends Controller
{
    public function store(Request $request)
    {
        $report = New Report();
        
        //$stock = \App\Stock::findOrFail($id);
        $stock = Stock::find($request->id);
        //dd($stock);
        
        $request->validate([
            'year' => 'required|max:4',
            'period' => 'required|max:1',
            'estimate' => 'required|max:5',
            'reported' => 'required|max:5',
        ]);
        
        $report->stock_id = $stock->id;
        $report->year = $request->year;
        $report->period = $request->period;
        $report->estimate = $request->estimate;
        $report->reported = $request->reported;
        
        $report->save();
        
        //dd($report);
        //dd($stock);
        
        //return redirect()->route('reports.show', ['id' => $report->stock_id]);
        //return view('stocks.show', [], ['stock' => $stock, 'report' => $report, 'reports' => $reports]);
        return redirect()->route('reports.show',[$report->stock_id]);
    }
    
    public function show($id)
    {
        $user = \Auth::user();
        //$user = User::findOrFail($stock->user_id);
        $stock = Stock::find($id);
        //$report = Report::find($stock->id);
        
        if(!$stock){
            return redirect('stocks.newregister');
        }
        
        //$reports = $user->stocks()->reports()->where('stock_id', $report->stock_id)->orderBy('year', 'desc')->orderBy('period', 'desc')->paginate(5);
        //$reports = $user->stocks()->reports()->where('stock_id', $stock->symbol);
        $reports = $stock->reports()->get();
        
        //dd($stock);
        //dd($reports);
        
        return view('stocks.show', [
            'stock' => $stock,
            'reports' => $reports
            ]);
    }
}
