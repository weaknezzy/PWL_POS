<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\t_penjualan_detail;

class t_penjualan_detailController extends Controller
{
    public function __invoke(Request $request)
    {
            //set validation
            $validator = Validator::make($request->all(), [
                
                'penjualan_id' => 'required',
                'barang_id' => 'required',
                'harga' => 'required',
                'jumlah' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //if validations fails
            if($validator->fails()) { 
                return response()->json($validator->errors(), 422);
            }
            $image = $request->image;

            //create user
            $penjualan = t_penjualan_detail ::create([
               
                'penjualan_id' => $request->penjualan_id,
                'barang_id'  => $request->barang_id,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'image' => $image->hashName(),
            ]);

            //return response JSON user is created
            if($penjualan) {
                return response()->json([
                    'success' => true,
                    'barang' => $penjualan,
                ], 201);
            }

            //return JSON process insert failed
            return response()->json([
                'success' => false,
            ], 409);
    }
    public function show($id)
    {
      $penjualan = t_penjualan_detail::find($id);
       if (!$penjualan) {
            return response()->json(['message' => 'Penjualan not found'], 404);
        }
        return response()->json($penjualan);
    }
}
