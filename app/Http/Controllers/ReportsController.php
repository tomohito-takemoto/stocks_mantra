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
        
        $stock = Stock::find($request->id);
        
        $request->validate([
            'year' => 'required|max:4',
            'period' => 'required|max:1',
            'estimate' => 'required|max:5',
            'reported' => 'required|max:5',
        ]);
        
        //dd($stock);
        
        $report->stock_id = $stock->id;
        $report->year = $request->year;
        $report->period = $request->period;
        $report->estimate = $request->estimate;
        $report->reported = $request->reported;
        
        $report->save();
        
        //dd($report);
        //dd($stock);

        //return view('stocks.show', [], ['stock' => $stock, 'report' => $report, 'reports' => $reports]);
        return redirect()->route('reports.show', [ $report->stock_id ]);
    }
    
    public function show($id)
    {
        $user = \Auth::user();
        $stock = Stock::find($id);
        
        if(!$stock){
            return redirect('stocks.newregister');
        }
        
        //$reports = $user->stocks()->reports()->where('stock_id', $report->stock_id)->orderBy('year', 'desc')->orderBy('period', 'desc')->paginate(5);
        //$reports = $user->stocks()->reports()->where('stock_id', $stock->symbol);
        $reports = $stock->reports()->get();
        
        //dd($stock);
        //dd($reports);
        //dd($stock->id);
        
        return view('reports.report_show', [
            'stock' => $stock,
            'reports' => $reports
            ]);
    }
    
    public function create($id)
    {
        $user = \Auth::user();
        $stock = Stock::find($id);
        $stocks = $user->stocks();
        
        //dd($request);
        //dd($stock);
        
        return view('reports.report', [
            'stock' => $stock,
        ]);
    }
    
    public function edit($id)
    {
        $user = \Auth::user();
        $report = Report::find($id);
        //$stock = $report->stock()->first();
        
        //dd($stock);
        //dd($report->id);
        return view('reports.edit', ['report' => $report]);
    }
    
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $stock = $report->stock()->first();
        
        $request->validate([
            'year' => 'required|max:4',
            'period' => 'required|max:1',
            'estimate' => 'required|max:5',
            'reported' => 'required|max:5',
        ]);
        
        $report->year = $request->year;
        $report->period = $request->period;
        $report->estimate = $request->estimate;
        $report->reported = $request->reported;
        
        $report->save();
        
        return redirect('reports/' . $stock->id);
        //return redirect()->action('ReportsController@show', ['id' => $stock->id]);
        //return view('reports.report_show', ['stock' => $stock,'report' => $report]);
    }
    
    public function destroy($id)
    {
        $report = Report::find($id);
        $stock = $report->stock()->first();
        
        $report->delete();

        // 前のURLへリダイレクトさせる
        return redirect('reports/' . $stock->id);
        //return redirect()->route('stocks.show', ['stock' => $stock->id]);
    }
}
