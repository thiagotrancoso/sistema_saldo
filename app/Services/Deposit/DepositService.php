<?php

namespace App\Services\Deposit;

class DepositService
{
    public function deposit($value)
    {
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
            return [
                'success' => true,
                'message' => 'Depósito feito com sucesso.'
            ];
        }

        return [
            'success' => false,
            'message' => 'Não foi possível fazer o depósito.'
        ];
    }
}
