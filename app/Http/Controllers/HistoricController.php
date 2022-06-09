<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricController extends Controller
{
    public function index()
    {
        $historics = auth()->user()->historics()->with('user')->get();

        return view('admin.historic.index', [
            'historics' => $historics
        ]);
    }
}
