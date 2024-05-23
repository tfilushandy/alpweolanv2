<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    protected $fillable = [
        'user_id',
        'foto',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
