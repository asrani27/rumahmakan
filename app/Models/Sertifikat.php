<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory; 
    protected $table = 'sertifikat';
    protected $guarded = ['id'];

    public function hasiluji()
    {
        return $this->belongsTo(HasilUji::class, 'hasil_uji_id');
    }
    
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
