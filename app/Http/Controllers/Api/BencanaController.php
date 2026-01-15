<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    public function index()
    {
        return Bencana::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_bencana' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'tingkat_keparahan' => 'required|in:Ringan,Sedang,Berat',
            'deskripsi' => 'nullable|string',
        ]);

        $bencana = Bencana::create($validated);

        return response()->json($bencana, 201);
    }

    public function show(Bencana $bencana)
    {
        return $bencana;
    }

    public function update(Request $request, Bencana $bencana)
    {
        $validated = $request->validate([
            'jenis_bencana' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'tingkat_keparahan' => 'required|in:Ringan,Sedang,Berat',
            'deskripsi' => 'nullable|string',
        ]);

        $bencana->update($validated);

        return response()->json($bencana);
    }

    public function destroy(Bencana $bencana)
    {
        $bencana->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
