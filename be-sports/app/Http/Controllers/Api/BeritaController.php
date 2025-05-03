<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Berita',
            'data' => $beritas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tgl_dibuat' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Upload gambar
        $gambar = $request->file('gambar_sampul');
        $gambar->storeAs('public/berita', $gambar->hashName());

        $berita = Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar_sampul' => $gambar->hashName(),
            'tgl_dibuat' => $request->tgl_dibuat,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil ditambahkan',
            'data' => $berita
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Berita',
            'data' => $berita
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tgl_dibuat' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek apakah ada file gambar baru
        if ($request->hasFile('gambar_sampul')) {
            // Hapus gambar lama
            Storage::delete('public/berita/' . basename($berita->gambar_sampul));
            
            // Upload gambar baru
            $gambar = $request->file('gambar_sampul');
            $gambar->storeAs('public/berita', $gambar->hashName());
            
            $berita->gambar_sampul = $gambar->hashName();
        }

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_dibuat' => $request->tgl_dibuat,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diperbarui',
            'data' => $berita
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        $berita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus'
        ], 200);
    }
} 