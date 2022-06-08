<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositFormRequest;
use App\Services\Deposit\DepositService;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function store(DepositFormRequest $request, DepositService $depositService)
    {
        return $depositService->deposit($request->input('value'));
    }
}
