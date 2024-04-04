<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class t_stok extends Model
{
    use HasFactory;
    protected $table = "t_stoks";
    protected $primaryKey = "stok_id";

    protected $fillable = [
        'stok_id',
        'barang_id',
        'user_id',
        'stok_tanggal',
        'stok_jumlah',
    ];

    public function barang(){
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function user(){
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
