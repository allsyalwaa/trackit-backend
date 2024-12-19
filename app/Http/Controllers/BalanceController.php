<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'amount' => 'required',
        ]);

        Balance::query()->create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Balance $balance){
        $balance->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Balance $balance){
        $validateData = $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',

        ]);
        $balance->update($validateData);
        return response()->json([
            'success' => true,
        ], Response::HTTP_ACCEPTED);
    }

    public function addAmount(Request $request, Balance $balance)
    {
        $validateData = $request->validate([
            'amount' => 'required|numeric',

        ]);
        $balance->amount += $validateData['amount'];
        $balance->save();
        return response()->json([
            'message' => 'Amount added successfully',
        ], Response::HTTP_ACCEPTED);

    }
}
