<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawFormRequest;
use App\Services\Withdraw\WithdrawService;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function store(WithdrawFormRequest $request, WithdrawService $withdrawService)
    {
        return $withdrawService->withdraw($request->input('value'));
    }
}
