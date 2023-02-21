<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onUpdate('restrict')->onDelete('cascade');
            $table->string('nama_pemilik')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('nik')->nullable();
            $table->string('nib')->nullable();
            $table->double('modal')->nullable();
            $table->integer('jumlah_karyawan')->nullable();
            $table->date('tanggal_mulai_usaha')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->string('rt_rumah')->nullable();
            $table->string('rw_rumah')->nullable();
            $table->string('desa_rumah')->nullable();
            $table->string('kecamatan_rumah')->nullable();
            $table->string('kabupaten_rumah')->nullable();
            $table->string('provinsi_rumah')->nullable();
            $table->string('kode_pos_rumah')->nullable();
            $table->string('koordinat_alamat_rumah')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('rt_usaha')->nullable();
            $table->string('rw_usaha')->nullable();
            $table->string('desa_usaha')->nullable();
            $table->string('kecamatan_usaha')->nullable();
            $table->string('kabupaten_usaha')->nullable();
            $table->string('provinsi_usaha')->nullable();
            $table->string('kode_pos_usaha')->nullable();
            $table->string('koordinat_alamat_usaha')->nullable();
            $table->string('foto')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('umkms');
    }
};
