<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use App\Services\Historic\HistoricService;
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

    public function search(Request $request, HistoricService $historicService)
    {
        $inputs = $request->only(['id', 'date', 'type']);
        return $historicService->search($inputs);
    }
}
