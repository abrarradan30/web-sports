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
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255',
                'konten' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tanggal' => 'required|date',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Upload gambar
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->storeAs('public/berita', $gambar->hashName());

            if (!$gambarPath) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengupload gambar'
                ], 500);
            }

            $berita = Berita::create([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => $gambar->hashName(),
                'tanggal' => $request->tanggal,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil ditambahkan',
                'data' => $berita
            ], 201);

        } catch (\Exception $e) {
            // Hapus gambar jika terjadi error
            if (isset($gambarPath)) {
                Storage::delete($gambarPath);
            }

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menambahkan berita',
                'error' => $e->getMessage()
            ], 500);
        }
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
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            Storage::delete('public/berita/' . $berita->gambar);
            
            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/berita', $gambar->hashName());
            
            $berita->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'gambar' => $gambar->hashName(),
                'tanggal' => $request->tanggal,
            ]);
        } else {
            $berita->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
                'tanggal' => $request->tanggal,
            ]);
        }

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

        // Hapus gambar
        Storage::delete('public/berita/' . $berita->gambar);

        $berita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus'
        ], 200);
    }
} 