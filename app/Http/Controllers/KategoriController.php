<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class KategoriController extends Controller
{
    
    // public function index(KategoriDataTable $dataTable)
    // {
    //     return $dataTable->render('kategori.index');
    // }
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem',
        ];

        $activeMenu = 'kategori';

        return view('kategoriTGS7.index',['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama')->with('barang');

        // if($request->kategori_id){
        //     $kategoris = $kategoris->where('kategori_id', $request->kategori_id);
        // }

        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' .url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a>';

                $btn .= '<a href="' .url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';

                $btn .= '<form class="d-inline-block" method="POST" action="' .url('/kategori/' . $kategori->kategori_id) . '">' .
                
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\');">Hapus</button>' .
                    '</form>';
                    return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Kategori Baru',
        ];

        $kategori = KategoriModel::all();
        $activeMenu = 'kategori';

        return view('kategoriTGS7.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|min:3|unique:m_kategoris,kategori_kode',
            'kategori_nama' => 'required|string|min:3',
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data Berhasil');

    }
    public function show(string $id){
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Kategori',
        ];

        $activeMenu = 'kategori';

        return view('kategoriTGS7.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }
    
    public function edit(string $id){
        $kategori = KategoriModel::find($id);
        
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Kategori',
        ];

        $activeMenu = 'kategori';
        
        return view('kategoriTGS7.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'kategori' => $kategori]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'kategori_kode' => 'required|string|min:3',
            'kategori_nama' => 'required|string|min:3',
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori')->with('success', 'Data Berhasil');
    }

    public function destroy(string $id){
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data Tidak Ditemukan');
        }

        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data Berhasil');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data Gagal Dihapus');
        }

    }

    // public function create()
    // {
    //     return view('kategori.create');
    // }
    
    // public function store(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'kategori_kode' => 'required',
    //         'kategori_nama' => 'required',
    //     ]);
    //     return redirect('/kategori');
    // }
    // public function store(StorePostRequest $request) : RedirectResponse 
    // {
    //     $validated = $request->validated();
    //     $validated = $request ->safe()->only(['kategori_kode', 'kategori_nama']);
    //     $validated = $request ->safe()->except(['kategori_kode', 'kategori_nama']);

    //     return redirect('/kategori');
    // }

    // public function level(Request $request): RedirectResponse
    // {
        
    //     $validated = $request->validate([
    //         'kategori_kode' => 'required',
    //         'kategori_nama' => 'required',
    //     ]);
    //     return redirect('/m-level');
    // }
    // public function edit($id)
    // {
    //     $data = KategoriModel::find($id);
    //     return view('kategori.edit', ['data'=> $data]);
    // }
    // public function update($id, Request $request )
    // {
    //     $kategori = KategoriModel::find($id);

    //     $kategori->kategori_kode = $request->kategori_kode;
    //     $kategori->kategori_nama = $request->kategori_nama;

    //     $kategori->save();
    //     return redirect('/kategori');
    // }
    // public function delete($id)
    // {
       
    //     $data = KategoriModel::find($id);
    //     $data->delete();
    //     return redirect('/kategori');
    // }
}
