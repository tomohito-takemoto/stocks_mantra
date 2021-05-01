<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Stocks;
use App\Report;

class ReportsController extends Controller
{
    public function store(Request $request)
    {
        $report = Report::find($request->id);
        $stock = Stocks::find($request->id);

        $request->validate([
            'year' => 'required|max:4',
            'period' => 'required|max:1',
            'estimate' => 'required|max:5',
            'reported' => 'required|max:5',
        ]);
            
        $report = $request->create([
            'year' => $request->year,
            'period' => $request->period,
            'estimate' => $request->estimate,
            'reported' => $request->reported,
        ]);
        
        dd($request);
        return view('stocks.show', [
            'report' => $report->id,
            'stock' => $stock,
        ]);
    }
}
