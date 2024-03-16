<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use Illuminate\Support\Facades\DB;


class Kategori extends Controller
{
    public function index()
    {
        $data = DB::table('m_kategoris')->get();
        return view('kategori', ['data' =>$data]);
    }
}
