<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use App\Models\KategoriOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriOlahragaController extends Controller
{
    //kirim semua data
    public function index()
    {
        //ambil semua data
        $kategori = KategoriOlahraga::latest()->paginate(5);

        //respon json
        return new KategoriResource(true, 'List Data kategori', $kategori);
    }

    //kirim data 
    public function store(Request $request)
    {
        //ambil semua data yang dibutuhkan
        $validator = Validator::make($request->all(), [
            'nama_olahraga'     => 'required',
            'deskripsi'   => 'required',
        ]);

        //check jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //buat datanya
        $kategori = KategoriOlahraga::create([
            'nama_olahraga'     => $request->nama_olahraga,
            'deskripsi'   => $request->deskripsi,
        ]);

        //respon json
        return new KategoriResource(true, 'Data Post Berhasil Ditambahkan!', $kategori);
    }

    //tampilkan data berdasarkan id
    public function show($id)
    {
        //cari data berdasarkan id
        $kategori = KategoriOlahraga::find($id);

        //tampilkan data melalui postman
        return new KategoriResource(true, 'Detail Data kategori!', $kategori);
    }

    //update data
    public function update(Request $request, $id)
    {
        // define validation rules
        $validator = Validator::make($request->all(), [
            'nama_olahraga'     => 'required',
            'deskripsi'   => 'required',
        ]);
    
        // check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // find post by ID
        $kategori = KategoriOlahraga::find($id);
    
        // check if post exists
        if (!$kategori) {
            return response()->json(['message' => 'Post not found'], 404);
        }
    
        // update post
        $kategori->update([
            'nama_olahraga'     => $request->nama_olahraga,
            'deskripsi'   => $request->deskripsi,
        ]);
    
        // return response
        return new KategoriResource(true, 'Data Post Berhasil Diubah!', $kategori);
    }

    //hapus data
    public function destroy($id)
    {

        //find post by ID
        $kategori = KategoriOlahraga::find($id);

        //delete post
        $kategori->delete();

        //return response
        return new KategoriResource(true, 'Data kategori Berhasil Dihapus!', null);
    }
}