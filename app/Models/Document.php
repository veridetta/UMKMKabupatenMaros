<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['umkms_id','kartu_keluarga','ktp','sku','tempat'];
    
    public function umkms(): BelongsTo
    {
        return $this->belongsTo(Umkm::class,'umkms_id');
    }
    
}
