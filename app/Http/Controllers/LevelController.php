<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into m_levels(level_kode, level_nama, created_at) values(?,?,?)',['CUS', 'Pelanggan', now()]);

        // return 'insert data baru berhasil';
        // $row = DB::update('update m_levels set level_nama = ? where level_kode = ?',['Customer','CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: '.$row.' baris';

        // $row = DB::delete('delete from m_levels where level_kode = ?',['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' .$row.'baris';

        // $data = DB::select('select * from m_levels');
        // return view('level.level', ['data' => $data]);
        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object)[
            'title' => 'Daftar Level yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level';

        $level = LevelModel::all();

        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    // public function store(StorePostRequest $request):RedirectResponse
    // {
    //     $validated = $request->validate();
    //     $validated = $request->safe()->only(['level_kode', 'level_nama']);
    //     $validated = $request->safe()->except(['level_kode', 'level_nama']);

    //     return redirect('/level');
    // }

    public function tambah()
    {
        return view('level.level_tambah');
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

        if($request->level_id){
            $levels = $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<a href="' .url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a>';

                $btn .= '<a href="' .url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';

                $btn .= '<form class="d-inline-block" method="POST" action="' .url('/level/' . $level->level_id) . '">' .
                
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
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Level baru'
        ];

        $level = LevelModel::all();
        $activeMenu = 'level';

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_levels,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Level baru ditambahkan');
    }

    public function show(string $id){

        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Level'
        ];

        $activeMenu = 'level';

        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page,'level' => $level,'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){

        $level = LevelModel::find($id);
        

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Level'
        ];

        $activeMenu = 'level';

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page,'level' => $level,'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){

        $validated = $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_levels,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|min:3'
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Level baru ditambahkan');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Level not found.');
        }
        try{
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Level deleted successfully.');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect('/level')->with('error', 'Level can not be deleted.');
        }
    }
}
