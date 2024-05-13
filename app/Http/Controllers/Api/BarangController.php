<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function __invoke(Request $request)
    {
            //set validation
            $validator = Validator::make($request->all(), [
                'kategori_id' => 'required',
                'barang_kode' => 'required',
                'barang_nama' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //if validations fails
            if($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            $image = $request->image;

            //create user
            $barang = BarangModel ::create([
                'kategori_id' => $request->kategori_id,
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'image' => $image->hashName(),
            ]);

            //return response JSON user is created
            if($barang) {
                return response()->json([
                    'success' => true,
                    'barang' => $barang,
                ], 201);
            }

            //return JSON process insert failed
            return response()->json([
                'success' => false,
            ], 409);
    }
    // public function index()
    // {
    //     return BarangModel::all();
    // }

    // public function store(Request $request)
    // {
    //     $barang = BarangModel::create($request->all());
    //     return response()->json($barang, 201);
    // }

    // public function show($id)
    // {
    //     $barang = BarangModel::find($id);
    //     if (!$barang) {
    //         return response()->json(['message' => 'Barang not found'], 404);
    //     }
    //     return response()->json($barang);
    // }


    // public function update(Request $request, $id)
    // {
    //     $barang = BarangModel::find($id);
    //     $barang->update($request->all());
    //     return BarangModel::find($id);
    // }

    // public function destroy($id)
    // {
    //     $barang = BarangModel::find($id);
    //     $barang->delete();
        
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Barang deleted',
    //     ]);
    // }
}
