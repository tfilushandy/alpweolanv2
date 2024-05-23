<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    protected $fillable = [
        'produk_id',
        'foto',
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Produk','produk_id');
    }
}