<?php

namespace App\Http\Controllers\Api;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GaleriResource;


class GaleriController extends Controller
{
    // Tampilkan semua galeri (GET /galeri)
    public function index()
    {
        $galeris = Galeri::all(); // Ambil semua data galeri
        return response()->json($galeris);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'url_media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_media' => 'required|in:gambar,video', // Validasi tipe media sesuai migrasi
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Upload file
        $image = $request->file('url_media');
        $image->storeAs('public', $image->hashName());

        // Simpan ke database
        $galeri = Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url_media' => $image->hashName(), // Simpan nama file saja
            'tipe_media' => $request->tipe_media,
        ]);

        return new GaleriResource(true, 'Data Post Berhasil Ditambahkan!', $galeri);
    }


    // Tampilkan satu galeri (GET /galeri/{id})
    public function show($id)
    {
        // Cari galeri berdasarkan ID
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return response()->json([
                'message' => 'Galeri tidak ditemukan'
            ], 404);
        }

        return response()->json($galeri);
    }

    public function update(Request $request, $id)
    { 
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'url_media' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_media' => 'required|in:gambar,video',
        ]);
        
        // perbaiki 
         if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $galeri = Galeri::find($id);


       //check if image is not empty
       if ($request->hasFile('image')) {

        //upload image
        $image = $request->file('image');
        $image->storeAs('/storage/app/public/', $image->hashName());

        //delete old image
        Storage::delete('/storage/app/public/' . basename($galeri->image));

        //update gale$galeri with new image
        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe_media'   => $request->tipe_media,
        ]);
    } else {

        //update gale$galeri without image
        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe_media'   => $request->tipe_media,
        ]);
          //return response
          return new GaleriResource(true, 'Data Post Berhasil Diubah!', $galeri);
    }
    }


    // Tampilkan data galeri untuk form edit (GET /galeri/{id}/edit)
    public function edit($id)
    {
        // Cari galeri berdasarkan ID
        $galeri = Galeri::find($id);

        // Jika tidak ditemukan
        if (!$galeri) {
            return response()->json([
                'success' => false,
                'message' => 'Galeri tidak ditemukan'
            ], 404);
        }

        // Jika ditemukan, kembalikan data
        return response()->json([
            'success' => true,
            'message' => 'Data galeri ditemukan',
            'data' => $galeri
        ], 200);
    }



    public function destroy($id)
    {
        // Cari galeri berdasarkan ID
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return response()->json([
                'message' => 'Galeri tidak ditemukan'
            ], 404);
        }

        // Hapus file media jika ada
        if ($galeri->url_media && Storage::exists('/storage/app/public/' . $galeri->url_media)) {
            Storage::delete('/storage/app/public/' . $galeri->url_media);
        }

        // Hapus data galeri
        $galeri->delete();

        // Return response sukses
        return response()->json([
            'message' => 'Galeri berhasil dihapus'
        ]);
    }
}
