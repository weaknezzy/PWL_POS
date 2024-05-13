<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\Barang as Authenticatable;  

class BarangModel extends Model
{   
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_barangs';
    protected $primaryKey ='barang_id';

    protected $fillable = [
        'barang_id','kategori_id','barang_kode','barang_nama','harga_beli','harga_jual','image'
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id','kategori_id');
    }

    public function t_penjualan_detail(): BelongsTo
    {
        return $this->belongsTo(t_penjualan_detail::class, 'detail_id','detail_id');
    }

    protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/'.$image),
        );
    }
}
