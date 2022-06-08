<?php

namespace App\Services\Deposit;

use Illuminate\Support\Facades\DB;

class DepositService
{
    public function deposit($value)
    {
        DB::beginTransaction();

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $totalBefore = $balance->amount ?? 0;
        $balance->amount += number_format($value, 2, '.', '');
        $result = $balance->save();

        $savedHistoric = auth()->user()->historics()->create([
            'type'         => 'I',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $balance->amount,
            'date'         => date('Y-m-d')
        ]);

        if ($result && $savedHistoric) {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Depósito feito com sucesso.'
            ];
        }

        DB::rollback();

        return [
            'success' => false,
            'message' => 'Não foi possível fazer o depósito.'
        ];
    }
}
