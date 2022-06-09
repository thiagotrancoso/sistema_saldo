<?php

namespace App\Services\Profile;

class ProfileService
{
    public function update(array $inputs)
    {
        $dataToUpdate = [
            'name'  => $inputs['name'],
            'email' => $inputs['email']
        ];

        if (!empty($inputs['password'])) {
            $dataToUpdate['password'] = bcrypt($inputs['password']);
        }

        $userUpdated = auth()->user()->update($dataToUpdate);

        if ($userUpdated) {
            return redirect()->route('site.profile')->with('message-alert', [
                'type' => 'success',
                'message' => 'Perfil atualizado com sucesso.'
            ]);
        }

        return back()->with('message-alert', [
            'type' => 'error',
            'message' => 'Falha ao atualizar o perfil.'
        ]);
    }
}
