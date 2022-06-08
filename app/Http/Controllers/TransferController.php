<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferFormRequest;
use App\Services\Transfer\TransferService;

class TransferController extends Controller
{
    public function transfer()
    {
        $balance = auth()->user()->balance ?? 0;

        return view('admin.balance.transfer', [
            'balance' => number_format($balance->amount, 2, ',', '.')
        ]);
    }

    public function store(TransferFormRequest $request, TransferService $transferService)
    {
        return $transferService->transfer($request->all());
    }
}
