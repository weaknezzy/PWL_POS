<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualModel extends Model
{
    use HasFactory;
    protected $table = "t_penjualans";
    protected $primaryKey = "penjualan_id";

    protected $fillable = [
        'penjualan_id','user_id','pembeli','penjualan_kode','penjualan_tanggal',
    ];

    public function user() {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
