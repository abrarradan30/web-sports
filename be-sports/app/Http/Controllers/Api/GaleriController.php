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
        // $galeri = Galeri::latest()->paginate(5); // data dibatasi 5
        $galeri = Galeri::latest()->get(); // data tampil semua

        return new GaleriResource(true, 'List Data Galeri', $galeri);
    }

    public function store(Request $request)
    { //define validation rules
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'url_media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_media' => 'required|in:gambar,video', 

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload url_media
        $url_media = $request->file('url_media');
        $url_media->storeAs('/public/galeri', $url_media->hashName());

        //create gale$galeri
        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'url_media'   => $url_media->hashName(),
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
            'tipe_media' => 'required|in:gambar,video',
        ]);

        // perbaiki 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $galeri = Galeri::find($id);


        //check if image is not empty
        if ($request->hasFile('url_media')) {

            //upload url_media
            $url_media = $request->file('url_media');
            $url_media->storeAs('/public/galeri/', $url_media->hashName());

            //delete old image
            Storage::delete('/public/galeri/' . basename($galeri->url_media));

            //update gale$galeri with new image
            $galeri->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'url_media' => $url_media->hashName(),
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

    public function destroy($id)
    {
        //find gale$galeri by ID
        $galeri = Galeri::find($id);

        //delete image
        Storage::delete('/public/galeri/' . basename($galeri->url_media));

        //delete gale$galeri
        $galeri->delete();

        //return response
        return new GaleriResource(true, 'Data Galeri Berhasil Dihapus!', null);
    }
}
