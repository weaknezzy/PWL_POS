<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\t_penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class t_penjualanController extends Controller
{
    public function __invoke(Request $request)
    {
            //set validation
            $validator = Validator::make($request->all(), [
                
                'user_id' => 'required',
                'pembeli' => 'required',
                'penjualan_kode' => 'required',
                'penjualan_tanggal' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //if validations fails
            if($validator->fails()) { 
                return response()->json($validator->errors(), 422);
            }
            $image = $request->image;

            //create user
            $penjualan = t_penjualan ::create([
               
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal,
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
}
