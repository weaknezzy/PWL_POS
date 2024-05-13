<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class t_penjualan extends Model
{
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 't_penjualans';
    protected $primaryKey = 'penjualan_id';

    protected $fillable = [
        'penjualan_id',
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
        'image',
    ];

    public function t_penjualan_detail(): BelongsTo
    {
        return $this->belongsTo(t_penjualan_detail::class, 'detail_id', 'detail_id');
    }

     protected function image(): Attribute{
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/'.$image),
        );
    }

}
