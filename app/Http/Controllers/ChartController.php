<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Stock;
use App\Report;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart.index');
    }

    public function chart()
    {
        $result = DB::table('agreement')->select('val_agrement')->get();
        return response()->json($result);
    }        
}
