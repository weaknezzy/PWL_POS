<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class t_penjualan_detail extends Model
{
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table ='t_penjualan_details';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'detail_id',
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
        'image',
    ];

    public function t_penjualan(): BelongsTo
    {
        return $this->belongsTo(t_penjualan_detail::class, 'penjualan_id','penjualan_id');
    }

    public function BarangModel(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id','barang_id');
    }
    

    protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/'.$image),
        );
    }
}
