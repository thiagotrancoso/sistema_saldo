<?php

namespace App\Services\Transfer;

use App\User;
use Illuminate\Support\Facades\DB;

class TransferService
{
    public function transfer(array $inputs)
    {
        $inputs['value'] = isset($inputs['value']) ? floatval($inputs['value']) : 0;

        $recipient = User::where('email', $inputs['sender'])->first();

        if (!$recipient) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Usuário destino não encontrado'
            ]);
        }

        if (auth()->user()->id === $recipient->id) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Não é posssível fazer uma transferência para si mesmo.'
            ]);
        }

        $balance = auth()->user()->balance;
        $currentBalance = $balance->amount ?? 0;

        if ($currentBalance < $inputs['value']) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Saldo insuficiente para transferência.'
            ]);
        }

        DB::beginTransaction();

        $totalBefore = $currentBalance;
        $balance->amount -= number_format($inputs['value'], 2, '.', '');
        $withdraw = $balance->save();

        $savedHistoric = auth()->user()->historics()->create([
            'type'                => 'T',
            'amount'              => $inputs['value'],
            'total_before'        => $totalBefore,
            'total_after'         => $balance->amount,
            'user_id_transaction' => $recipient->id,
            'date'                => date('Y-m-d')
        ]);

        $recipientBalance = $recipient->balance()->firstOrCreate([]);
        $recipientTotalBefore = $recipientBalance->amount ?? 0;
        $recipientBalance->amount += number_format($inputs['value'], 2, '.', '');
        $recipientDeposit = $recipientBalance->save();

        $recipientSavedHistoric = $recipient->historics()->create([
            'type'                => 'I',
            'amount'              => $inputs['value'],
            'total_before'        => $recipientTotalBefore,
            'total_after'         => $recipientBalance->amount,
            'user_id_transaction' => auth()->user()->id,
            'date'                => date('Y-m-d')
        ]);

        if ($withdraw && $savedHistoric && $recipientDeposit && $recipientSavedHistoric) {
            DB::commit();

            return redirect()->route('admin.balance')->with('message-alert', [
                'type'    => 'success',
                'message' => 'Transferência feita com sucesso.'
            ]);
        }

        DB::rollback();

        return back()->with('message-alert', [
            'type'    => 'error',
            'message' => 'Não foi possível fazer a transferência.'
        ]);
    }
}
