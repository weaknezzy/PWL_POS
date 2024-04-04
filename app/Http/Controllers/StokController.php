<?php

namespace App\Http\Controllers;

use App\Models\t_stok;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BarangModel;
use App\Models\UserModel;



class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar,Stok',
            'list' => ['Home','Stok']
        ];

        $page = (object) [
            'title' => 'Daftar stok yang terdaftar dalam sistem',
        ];

        $activeMenu = 'stok';

        return view('stok.index',['breadcrumb' => $breadcrumb,'page' => $page,'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $stoks = t_stok::select('stok_id','barang_id','user_id','stok_tanggal','stok_jumlah')->with('barang','user');

        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="'. url('/stok/' .$stok->stok_id). '" class="btn btn-info btn-sm">Detail</a>';

                $btn .= '<a href="' .url('/stok/' .$stok->stok_id. '/edit'). '" class="btn btn-warning btn-sm">Edit</a>';

                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/stok/'.$stok->stok_id). '">'
                    .csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\');">Hapus</button></form>';
                    return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Stok',
            'list' => ['Home','Stok','Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Stok baru'
        ];

        $barang = BarangModel::all();
        $user = UserModel::all();

        $activeMenu = 'stok';
        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request ->validate([
            'stok_tanggal' => 'required',
            'stok_jumlah' => 'required|integer',
            'barang_id' => 'required',
            'user_id' => 'required',
        ]);

        t_stok::create([
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
        ]);

        return redirect('/stok')->with('success', 'Stok baru telah ditambahkan');
    }

    public function show(string $id)
    {
        $stok = t_stok::with('barang','user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Stok',
            'list' => ['Home','Stok','Detail']
        ];

        $page = (object) [
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page,'stok' => $stok,'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $stok = t_stok::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list' => ['Home','Stok','Edit']
        ];

        $page = (object) [
            'title' => 'Edit Stok'
        ];
        $activeMenu = 'stok';
        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page,'stok' => $stok,'barang' => $barang,'user' => $user,'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request ->validate([
            'stok_tanggal' => 'required',
            'stok_jumlah' => 'required|integer',
            'barang_id' => 'required',
            'user_id' => 'required',
        ]);

        t_stok::find($id)->update([
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
        ]);

        return redirect('/stok')->with('success', 'Stok baru telah ditambahkan');
    }

    public function destroy(string $id)
    {
       $check = t_stok::find($id);
        if (!$check) {
            return redirect('/stok')->with('error', 'Stok not found.');
        }
        try {
            t_stok::destroy($id);
            return redirect('/stok')->with('success', 'Stok deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Stok can not be deleted.');
        }

    }
}
