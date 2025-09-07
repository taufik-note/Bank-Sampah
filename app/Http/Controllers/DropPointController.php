<?php

namespace App\Http\Controllers;

use App\Models\DropPoint;
use Illuminate\Http\Request;

class DropPointController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan data drop point dengan filter pencarian nama lokasi
        $query = DropPoint::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_lokasi', 'like', "%{$search}%");
        }

        $dropPoints = $query->paginate(10);

        return view('drop-points.index', compact('dropPoints'));
    }

    public function create()
    {
        return view('drop-points.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:512',
            'koordinat' => 'nullable|string|max:100',
        ]);

        DropPoint::create($validated);

        return redirect()->route('drop-points.index')->with('success', 'Drop Point berhasil dibuat.');
    }

    public function edit(DropPoint $dropPoint)
    {
        return view('drop-points.edit', compact('dropPoint'));
    }

    public function update(Request $request, DropPoint $dropPoint)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:512',
            'koordinat' => 'nullable|string|max:100',
        ]);

        $dropPoint->update($validated);

        return redirect()->route('drop-points.index')->with('success', 'Drop Point berhasil diperbarui.');
    }

    public function destroy(DropPoint $dropPoint)
    {
        $dropPoint->delete();

        return redirect()->route('drop-points.index')->with('success', 'Drop Point berhasil dihapus.');
    }
}
