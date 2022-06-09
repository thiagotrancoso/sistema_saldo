<?php

namespace App\Services\Withdraw;

use Illuminate\Support\Facades\DB;

class WithdrawService
{
    public function withdraw($value)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);

        if ($balance->amount < $value) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Saldo insuficiente.'
            ]);
        }

        DB::beginTransaction();

        $totalBefore = $balance->amount ?? 0;
        $balance->amount -= number_format($value, 2, '.', '');
        $result = $balance->save();

        $savedHistoric = auth()->user()->historics()->create([
            'type'         => 'O',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $balance->amount,
            'date'         => date('Y-m-d')
        ]);

        if ($result && $savedHistoric) {
            DB::commit();

            return redirect()->route('admin.financial.balance')->with('message-alert', [
                'type' => 'success',
                'message' => 'Saque feito com sucesso.'
            ]);
        }

        DB::rollback();

        return back()->with('message-alert', [
            'type' => 'error',
            'message' => 'Não foi possível fazer o saque.'
        ]);
    }
}
