<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all();
        return response()->json($kategori);
    }
    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }
    public function show($id)
    {
        $kategori = KategoriModel::find($id);
        if ($kategori) {
            return response()->json($kategori);
        }
        return response()->json(['message' => 'Not found'], 404);
    }
    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->update($request->all());
        return KategoriModel::find($id);
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori deleted',
        ]);
    }
}
