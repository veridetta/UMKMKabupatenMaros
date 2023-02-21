<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onUpdate('restrict')->onDelete('cascade');
            $table->string('no_pendaftaran')->unique();
            $table->string('asal_sekolah')->nullable();
            $table->string('npsn_asal_sekolah')->nullable();
            $table->string('nisn')->unique();
            $table->string('nik')->nullable();
            $table->string('kewernegaraan')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tanggal_lahir')->default(Carbon::now());
            $table->string('jenis_kelamin')->nullable();
            $table->integer('anak_dari')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('agama')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('hobi')->nullable();
            $table->string('email')->nullable();
            $table->string('handphone')->nullable();
            $table->string('biaya_sekolah')->nullable();
            $table->boolean('paud')->nullable();
            $table->boolean('tk')->nullable();
            $table->boolean('hepatitis')->nullable();
            $table->boolean('polio')->nullable();
            $table->boolean('bcg')->nullable();
            $table->boolean('campak')->nullable();
            $table->boolean('dpt')->nullable();
            $table->boolean('covid')->nullable();
            $table->string('no_kip')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('kepala_keluarga')->nullable();
            $table->string('stts_tempat_tinggal')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('koordinat_alamat')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('waktu_tempu')->nullable();
            $table->string('stts_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('stts_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('no_hp_wali')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
