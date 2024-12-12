<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = Balance::query();
        return response()->json($balance->get());
    }

    public function show($id){
        $balance = Balance::query()->with('transactions')->findOrFail($id);
        return response()->json($balance);
    }

    public function showBinding(Balance $balance){
        $balance->load ('transactions');
        return response()->json($balance);
    }
}
