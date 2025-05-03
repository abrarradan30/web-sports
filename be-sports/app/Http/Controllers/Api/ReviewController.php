<?php

// app/Http/Controllers/Api/ReviewController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // GET all reviews
    public function index()
    {
        return response()->json(Review::all(), 200);
    }

    // POST create review
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'pesan' => 'nullable|string',
            'tgl_kirim' => 'required|date',
        ]);

        $review = Review::create($data);

        return response()->json(['success' => true, 'review' => $review], 201);
    }

    // GET single review
    public function show($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'review' => $review]);
    }

    // PUT update review
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'pesan' => 'nullable|string',
            'tgl_kirim' => 'required|date',
        ]);

        $review->update($data);

        return response()->json(['success' => true, 'message' => 'Review berhasil diupdate', 'review' => $review]);
    }

    // DELETE review
    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $review->delete();

        return response()->json(['success' => true, 'message' => 'Review berhasil dihapus']);
    }
}
