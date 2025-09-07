<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\DropPoint;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::with('dropPoint');

        // Filter berdasarkan tanggal dan drop_point_id
        if ($request->has('drop_point_id') && $request->drop_point_id != '') {
            $query->where('drop_point_id', $request->drop_point_id);
        }
        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->where('tanggal', $request->tanggal);
        }

        $transactions = $query->paginate(10);
        $dropPoints = DropPoint::all(); // untuk dropdown filter

        return view('transactions.index', compact('transactions', 'dropPoints'));
    }

    public function create()
    {
        $dropPoints = DropPoint::all();

        return view('transactions.create', compact('dropPoints'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'drop_point_id' => 'required|exists:drop_points,id',
            'tanggal' => 'required|date',
            'jenis_sampah' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0.1',
            'poin' => 'required|integer|min:0',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function edit(Transaction $transaction)
    {
        $dropPoints = DropPoint::all();

        return view('transactions.edit', compact('transaction', 'dropPoints'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'drop_point_id' => 'required|exists:drop_points,id',
            'tanggal' => 'required|date',
            'jenis_sampah' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0.1',
            'poin' => 'required|integer|min:0',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
