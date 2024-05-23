<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $table = 'alamat_pengiriman';
    protected $fillable = [
        'user_id',
        'status',
        'IDGAME',
        'no_tlp',
        'EMAIL',
    ];

    

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
