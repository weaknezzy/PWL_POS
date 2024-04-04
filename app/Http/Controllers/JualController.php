<?php

namespace App\Http\Controllers;

use App\Models\JualModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\UserModel;

class JualController extends Controller
{
    public function index()
    {
       $breadcrumb = (object) [
           'title' => 'Daftar Penjualan',
           'list' => ['Home', 'Jual']
       ];

       $page = (object) [
           'title' => 'Daftar Penjualan yang terdaftar dalam sistem'
       ];
       
       $activeMenu = 'jual';

       return view ('jual.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $juals = JualModel::select('penjualan_id', 'user_id','pembeli', 'penjualan_kode', 'penjualan_tanggal')
            ->with('user');

        return DataTables::of($juals)
            ->addIndexColumn()
            ->addColumn('aksi', function ($jual) {
                $btn = '<a href="' . url('/penjualan/' . $jual->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a>';

                $btn .= '<a href="' . url('/penjualan/' . $jual->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';

                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $jual->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah',
            'list' => ['Home', 'Jual', 'Create']
        ];

        $page = (object) [
            'title' => 'Tambah Jual baru'
        ];

        $activeMenu = 'jual';
        $user = UserModel::all();

        return view('jual.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
        ]);

        JualModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/penjualan')->with('success', 'Jual baru telah ditambahkan');
    }

    public function show(string $id)
    {
        $jual = JualModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Jual', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'jual';
        return view ('jual.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'jual' => $jual]);
    }

    public function edit(string $id)
    {
        $jual = JualModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Penjualan',
            'list' => ['Home', 'Jual', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Penjualan'
        ];

        $activeMenu = 'jual';
        return view ('jual.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'jual' => $jual, 'user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
        ]);

        $jual = JualModel::find($id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/penjualan')->with('success', 'Jual baru telah ditambahkan');
    }

    public function destroy(string $id)
    {
        $check = JualModel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Jual not found.');
    }
    try {
        JualModel::destroy($id);
        return redirect('/penjualan')->with('success', 'Jual deleted successfully.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect('/penjualan')->with('error', 'Jual can not be deleted.');
    }
    }
}