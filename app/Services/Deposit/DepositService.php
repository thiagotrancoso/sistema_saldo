<?php

namespace App\Services\Deposit;

class DepositService
{
    public function deposit($value)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $balance->amount += number_format($value, 2, '.', '');
        $result = $balance->save();

        if ($result) {
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
