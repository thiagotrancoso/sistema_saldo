<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricController extends Controller
{
    public function index()
    {
        $historics = auth()->user()->historics()->with('user')->paginate(2);

        return view('admin.historic.index', [
            'historics' => $historics,
            'types' => identify_type_transaction()
        ]);
    }

    public function search(Request $request)
    {
        $inputs = $request->all();

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
            'types' => identify_type_transaction()
        ]);
    }
}
