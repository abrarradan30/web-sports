<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProudukResource;
use App\Models\ProdukOlahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Ambil semua data produk
    public function index()
    {
        $prouduk = ProdukOlahraga::latest()->paginate(5);
        return new ProudukResource(true, 'List data produk', $prouduk);
    }

    //show data berdasarkan id
    public function Show($id)
    {
        $produk = ProdukOlahraga::find($id);

        return new ProudukResource(true, 'Detail Data Prouduk!', $produk);
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk'    => 'required|string|max:255',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi'      => 'required|string',
            'harga'          => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
            'warna'          => 'required|string|max:50',
            'ukuran'         => 'required|string',
            'jenis_kelamin'  => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('gambar');
        $image->storeAs('public/produk', $image->hashName());

        $produk = ProdukOlahraga::create([
            'nama_produk'    => $request->nama_produk,
            'gambar'         => $image->hashName(),
            'deskripsi'      => $request->deskripsi,
            'harga'          => $request->harga,
            'stok'           => $request->stok,
            'warna'          => $request->warna,
            'ukuran'         => $request->ukuran,
            'jenis_kelamin'  => $request->jenis_kelamin,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil disimpan!',
            'data'    => $produk
        ]);
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk'   => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'harga'         => 'required|numeric|min:0',
            'stok'          => 'required|integer|min:0',
            'warna'         => 'required|string|max:50',
            'ukuran'        => 'required|string',
            'jenis_kelamin' => 'required|boolean',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $produk = ProdukOlahraga::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('public/produk', $image->hashName());

            Storage::delete('public/produk/' . $produk->gambar);

            $produk->gambar = $image->hashName();
        }

        $produk->update([
            'nama_produk'    => $request->nama_produk,
            'deskripsi'      => $request->deskripsi,
            'harga'          => $request->harga,
            'stok'           => $request->stok,
            'warna'          => $request->warna,
            'ukuran'         => $request->ukuran,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'gambar'         => $produk->gambar,
        ]);

        return new ProudukResource(true, 'Produk berhasil diupdate!', $produk);
    }

    public function destroy($id)
    {

        //find post by ID
        $produk = ProdukOlahraga::find($id);

        //delete image
        Storage::delete('public/produk/'.basename($produk->image));

        //delete post
        $produk->delete();

        //return response
        return new ProudukResource(true, 'Data Produk Berhasil Dihapus!', null);
    }
}
