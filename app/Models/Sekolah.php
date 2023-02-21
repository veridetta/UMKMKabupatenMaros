<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = ['nsm','npsn','jenjang_sekolah','status_sekolah','alamat','provinsi','kabupaten','kecamatan','no_telpon','email','website','kepala_sekolah','nip'];
}
