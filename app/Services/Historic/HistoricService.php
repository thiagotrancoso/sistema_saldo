<?php

namespace App\Services\Historic;

use App\Models\Historic;

class HistoricService
{
    public function search(array $inputs)
    {
        $resultSearch = Historic::where(function ($query) use ($inputs) {
            if (!empty($inputs['id'])) {
                $query->where('id', $inputs['id']);
            }

            if (!empty($inputs['date'])) {
                $query->where('date', $inputs['date']);
            }

            if (!empty($inputs['type'])) {
                $query->where('type', $inputs['type']);
            }
        })->paginate(2);

        return view('admin.historic.index', [
            'historics' => $resultSearch,
            'types'     => identify_type_transaction(),
            'inputs'    => $inputs
        ]);
    }
}
