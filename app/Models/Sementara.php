<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sementara extends Model
{
    use HasFactory;
    protected $table = 't_sementara';
    protected $guarded = ['id'];

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'makanan_id');
    }
}
