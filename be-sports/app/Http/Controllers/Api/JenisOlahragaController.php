<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JenisOlahragaResource;
use App\Models\JenisOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisOlahragaController extends Controller
{
    //
    public function index()
    {
        //ambil semua data
        $jenis = JenisOlahraga::latest()->paginate(5);

        //respon json
        return new JenisOlahragaResource(true, 'List Data Jenis Olahraga', $jenis);
    }
    
    //create
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
        $jenis = JenisOlahraga::create([
            'nama_olahraga'     => $request->nama_olahraga,
            'deskripsi'   => $request->deskripsi,
        ]);

        //respon json
        return new JenisOlahragaResource(true, 'Data Jenis Olahraga Berhasil Ditambahkan!', $jenis);
    }

    //show data berdasarkan id
    public function show($id)
    {
        //cari data berdasarkan id
        $jenis = JenisOlahraga::find($id);

        //tampilkan data melalui postman
        return new JenisOlahragaResource(true, 'Detail Data Olahraga!', $jenis);
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
        $kategori = JenisOlahraga::find($id);
    
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
        return new JenisOlahragaResource(true, 'Data Jenis Olahraga Berhasil Diubah!', $kategori);
    }

    //hapus data
    public function destroy($id)
    {

        //find post by ID
        $kategori = JenisOlahraga::find($id);

        //delete post
        $kategori->delete();

        //return response
        return new JenisOlahragaResource(true, 'Data Jenis Olahraga Berhasil Dihapus!', null);
    }
}
