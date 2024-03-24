<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;

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

        $data = DB::select('select * from m_levels');
        return view('level.level', ['data' => $data]);
    }
    public function store(StorePostRequest $request):RedirectResponse
    {
        $validated = $request->validate();
        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);

        return redirect('/level');
    }

    public function tambah()
    {
        return view('level.level_tambah');
    }

}
