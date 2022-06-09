<?php

namespace App\Services\Transfer;

use App\User;
use Illuminate\Support\Facades\DB;

class TransferService
{
    public function transfer(array $inputs)
    {
        $inputs['value'] = isset($inputs['value']) ? floatval($inputs['value']) : 0;

        $receiver = User::where('email', $inputs['sender'])->first();

        if (!$receiver) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Usuário destino não encontrado'
            ]);
        }

        if (auth()->user()->id === $receiver->id) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Não é posssível fazer uma transferência para si mesmo.'
            ]);
        }

        $senderBalance = auth()->user()->balance;
        $senderCurrentBalance = $senderBalance->amount ?? 0;

        if ($senderCurrentBalance < $inputs['value']) {
            return back()->with('message-alert', [
                'type' => 'error',
                'message' => 'Saldo insuficiente para transferência.'
            ]);
        }

        DB::beginTransaction();

        $senderTotalBefore = $senderCurrentBalance;
        $senderBalance->amount -= number_format($inputs['value'], 2, '.', '');
        $senderWithdraw = $senderBalance->save();

        $senderSavedHistoric = auth()->user()->historics()->create([
            'type'                => 'T',
            'amount'              => $inputs['value'],
            'total_before'        => $senderTotalBefore,
            'total_after'         => $senderBalance->amount,
            'user_id_transaction' => $receiver->id,
            'date'                => date('Y-m-d')
        ]);

        $receiverBalance = $receiver->balance()->firstOrCreate([]);
        $receiverTotalBefore = $receiverBalance->amount ?? 0;
        $receiverBalance->amount += number_format($inputs['value'], 2, '.', '');
        $receiverDeposit = $receiverBalance->save();

        $receiverSavedHistoric = $receiver->historics()->create([
            'type'                => 'I',
            'amount'              => $inputs['value'],
            'total_before'        => $receiverTotalBefore,
            'total_after'         => $receiverBalance->amount,
            'user_id_transaction' => auth()->user()->id,
            'date'                => date('Y-m-d')
        ]);

        if ($senderWithdraw && $receiverDeposit && $senderSavedHistoric && $receiverSavedHistoric) {
            DB::commit();

            return redirect()->route('admin.financial.balance')->with('message-alert', [
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
