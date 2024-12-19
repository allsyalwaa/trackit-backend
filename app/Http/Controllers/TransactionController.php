<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::query()->with('balance');
        return response()->json($transactions->get());
    }

    public function  show($id)
    {
        $transaction = Transaction::query()->with('balance')->findOrFail($id);
        return response()->json($transaction);
    }

    public function showBinding(Transaction $transaction)
    {
        $transaction->load('balance');
        return response()->json($transaction);

    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'balance_id' => 'required'
        ]);

        Transaction::query()->create($validateData);

        return response()->json([
            'success' => true,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Transaction $transaction){
        $transaction->delete();
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }

    public function update(Request $request, Transaction $transaction){
        $validateData = $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'balance_id' => ['required','exists:balances,id']

        ]);
        $transaction->update($validateData);
        return response()->json([
            'success' => true,

        ], Response::HTTP_ACCEPTED);
    }
}
