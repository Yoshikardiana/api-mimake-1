<?php

namespace App\Http\Controllers;

use App\Models\BarangM;
use Illuminate\Http\Request;
use App\Http\Resources\BarangR;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class BarangC extends Controller
{
    public function index()
    {
        $barang = BarangM::all();

        return new BarangR(true, 'List data barang', $barang);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            '_barang' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'qty' => 'required',
            'harga' => 'required',
            'barcode' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $gambar_barang = $request->file('_barang');
        $gambar_barang->storeAs('public/barang', $gambar_barang->hashName());

        $barang = BarangM::create([
            'nama_barang' => $request->nama_barang,
            '_barang' => $gambar_barang->hashName(),
            'qty' => $request->qty,
            'harga' => $request->harga,
            'barcode' => $request->barcode,
        ]);

        return new BarangR(true,'Data barang Berhasil Di Tambahkan!', $barang);
    }

    public function show(BarangM $barang){
        return new BarangR(true, 'Data barang Di Temukan!', $barang);
    }
    public function update(Request $request, BarangM $barang){
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'barcode' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        if($request ->hasfile('_barang')){

            $gambar_barang = $request->file('_barang');
            $gambar_barang->storeAs('public/barang', $gambar_barang->hashName());

            Storage::delete('public/barang/'.$barang->gambar_barang);

            $barang->update([
                'nama_barang' => $request->nama_barang,
                '_barang' => $gambar_barang->hashName(),
                'qty' => $request->qty,
                'harga' => $request->harga,
                'barcode' => $request->barcode,
            ]);
        }else{
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'qty' => $request->qty,
                'harga' => $request->harga,
                'barcode' => $request->barcode,
            ]);
        }
        return new BarangR(true, 'Data barang Berhasil Diubah!', $barang);
    }

    public function destroy(BarangM $barang){
        Storage::delete('public/barang'.$barang->gambar_barang);

        $barang->delete();

        return new BarangR(true, 'Data barang Berhasil Dihapus!', null);
    }
}
