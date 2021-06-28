<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id'];
    
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
    
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'meja_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
