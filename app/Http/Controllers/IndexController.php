<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('fromAccount', 'toAccount')
            ->orderBy('created_at', 'desc')
            ->get();
        return Inertia::render('Index', [
            'transactions' => $transactions,
        ]);
    }
}
