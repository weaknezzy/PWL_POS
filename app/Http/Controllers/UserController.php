<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 5
        // ];
        // UserModel::where('username','customer-1')->update($data); // tambahkan data ke table m_users

        // //coba akses model UserModel
        // $user = UserModel::all(); //ambil semua data dari table m_users
        // return view('user',['data' => $user]);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view ('user', ['data' => $user]);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(20, ['username', 'nama'], function () { 
        //     abort(404);
        // });

        // return view ('user',['data' => $user]);

        // $user = UserModel::findOrFail(1);
        // return view ('user', ['data' => $user]);

        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view ('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user);
        // return view('user', ['data' => $user]);
        //Pratikum 2.4 - Retreiving or Creating Models
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);
        //Pratikum 2.4 - Retreiving or Creatong Models
        //-----------------------------------------------//
        //Pratikum 2.5 - Attribute Changes
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager56';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama', 'username']); //false

        // $user->isClean();//false
        // $user->isClean('username'); //false
        // $user->isClean('nama'); //true
        // $user->isClean(['nama', 'username']); //false

        // $user->save();

        // $user->isDirty(); //false
        // $user->isClean(); //true
        // dd($user->isDirty());

        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        // $user -> username = 'manager12';
        // $user -> save();

        // $user->wasChanged(); //true
        // $user->wasChanged('username'); //true
        // $user->wasChanged(['username','level_id']);//true
        // $user->wasChanged('nama');//false
        // dd($user->wasChanged)(['nama', 'username']);//true
        //Pratikum 2.5 Atribute Changes
        //-------------------------------------------------------//
        //Pratikum 2.6 Create,Read,Update,Delete(CRUD)
        $user = UserModel::all();
        return view('user.user', ['data' => $user]);
        //Pratikum 2.7 Relationship
        // $user = UserModel::with('level')->get();

        // dd($user);

        // $user = UserModel::with('level')->get();
        // return view('user', ['data' => $user]);
    }
    public function tambah()
    {
        return view('user.user_tambah');
    }
    public function tambah_simpan(StorePostRequest $request): RedirectResponse
    {
        // UserModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => Hash::make($request->password),
        //     'level_id' => $request->level_id
        // ]);
        // $validated = $request->validate([
        //     'username' => 'required',
        //     'nama' => 'required',
        //     'password' => 'required',
        //     'level_id' => 'required',
        // ]);
        // return redirect('/user');

        $validated = $request->validate();
        $validated = $request->safe()->only(['username', 'nama', 'password', 'level_id']);
        $validated = $request->safe()->except(['username', 'nama', 'password', 'level_id']);

        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user.user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
