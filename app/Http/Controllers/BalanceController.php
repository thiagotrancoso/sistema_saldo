<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function balance()
    {
        $balance = auth()->user()->balance;
        $amount = $balance->amount ?? 0;

        return view('admin.balance.index', [
            'amount' => number_format($amount, 2, ',', '.')
        ]);
    }
}
