<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontaks = Kontak::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Kontak',
            'data' => $kontaks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'tgl_kirim' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kontak = Kontak::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pesan kontak berhasil dikirim',
            'data' => $kontak
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kontak = Kontak::find($id);

        if (!$kontak) {
            return response()->json([
                'success' => false,
                'message' => 'Pesan kontak tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Pesan Kontak',
            'data' => $kontak
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontak = Kontak::find($id);

        if (!$kontak) {
            return response()->json([
                'success' => false,
                'message' => 'Pesan kontak tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'tgl_kirim' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $kontak->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pesan kontak berhasil diperbarui',
            'data' => $kontak
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontak = Kontak::find($id);

        if (!$kontak) {
            return response()->json([
                'success' => false,
                'message' => 'Pesan kontak tidak ditemukan'
            ], 404);
        }

        $kontak->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesan kontak berhasil dihapus'
        ], 200);
    }
} 