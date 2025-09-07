<?php

namespace App\Http\Controllers;

use App\Models\DropPoint;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $dropPointsCount   = DropPoint::count();
        $transactionsCount = Transaction::count();
        $totalWeight       = Transaction::sum('berat'); // kg

        return view('dashboard', compact(
            'dropPointsCount', 'transactionsCount', 'totalWeight'
        ));
    }
}
