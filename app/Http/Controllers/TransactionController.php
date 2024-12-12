<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

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
}
