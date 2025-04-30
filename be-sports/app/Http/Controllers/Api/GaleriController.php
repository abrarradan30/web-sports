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
        //get all galeri$galeri
        $galeri = Galeri::latest()->paginate(5);

        //return collection of galeri$galeri as a resource
        return new GaleriResource(true, 'List Data Galeri', $galeri);
    }

    public function store(Request $request)
    { //define validation rules
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'url_media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_media' => 'required|in:gambar,video', // Validasi tipe media sesuai migrasi

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('url_media');
        $image->storeAs('/storage/galeri/app/public/', $image->hashName());

        //create gale$galeri
        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'tipe_media'   => $request->tipe_media,
        ]);

        //return response
        return new GaleriResource(true, 'Data Galeri Berhasil Ditambahkan!', $galeri);
    }


    // Tampilkan satu galeri (GET /galeri/{id})
    public function show($id)
    {
       //find post by ID
       $galeri = Galeri::find($id);

       //return single post as a resource
       return new GaleriResource(true, 'Detail Data Galeri!', $galeri);
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
            return new GaleriResource(true, 'Data Galeri Berhasil Diubah!', $galeri);
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
        //find gale$galeri by ID
        $galeri = Galeri::find($id);

        //delete image
        Storage::delete('/storage/app/public/' . basename($galeri->url_media));

        //delete gale$galeri
        $galeri->delete();

        //return response
        return new GaleriResource(true, 'Data Galeri Berhasil Dihapus!', null);
    }
}
