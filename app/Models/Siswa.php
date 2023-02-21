<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['jalur', 'asal_sekolah','sekolahs_id','npsn_asal_sekolah','nisn','nik','kewernegaraan',
                            'nama_lengkap','tempat','tanggal_lahir','jenis_kelamin','anak_dari',
                            'jumlah_saudara','agama','cita_cita','hobi','email','handphone','biaya_sekolah','paud','tk','hepatitis','polio','bcg','campak','dpt','covid','no_kip','no_kk','kepala_keluarga',
                            'stts_tempat_tinggal','alamat','rt','rw','desa','kecamatan','kabupaten','provinsi','kode_pos','koordinat_alamat','transportasi','jarak','waktu_tempu',
                            'stts_ayah','nik_ayah','nama_ayah','tempat_lahir_ayah','tgl_lahir_ayah','pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','no_hp_ayah',
                            'stts_ibu','nik_ibu','nama_ibu','tempat_lahir_ibu','tgl_lahir_ibu','pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu','no_hp_ibu',
                            'nik_wali','nama_wali','tgl_lahir_wali','pendidikan_wali','pekerjaan_wali','penghasilan_wali','no_hp_wali',
                            'foto','status'
                        ];
   
    public function Users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Sekolahs(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }


    
}
