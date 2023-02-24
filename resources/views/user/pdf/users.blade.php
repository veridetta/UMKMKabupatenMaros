@extends('layouts.app')
@section('content')
@include('components.navbar')
@include('components.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
     @include('components.alert')
      <h1>Formulir</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Formulir</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulir Pendaftaran UMKM Baru</h5>
                <div class="row mt-3">
                    <div class="col-3">
                        <div class="row text-center">
                            <div class="col-12">
                                @if ($umkm?->foto)
                                    <img  src="{{asset('storage/'.$umkm?->foto)}}" alt="foto"  style="border-radius: 200px" width="200px" height="200px">
                                
                                    
                                @else
                                <img src="{{asset('img/profile-img.jpg')}}" style="border-radius: 200px" width="200px" height="200px">
                                    
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <b>Status Pendaftaran</b>
                            </div>
                            <div class="col-12 mt-3">
                                @if ($umkm?->status == 0)
                                    <button class="btn btn-danger">Data Belum Lengkap</span>
                                    
                                @elseif ($umkm?->status == 1)
                                    <button class="btn btn-warning">Belum Dikonfirmasi</span>

                                    
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-9 ml-4 ">
                        <div class="row mb-3">
                            <label for="nama_pemilik" class="col-sm-4 col-form-label">Nama Pemilik</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" value="{{ old('nik', $umkm?->nama_pemilik ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="nama_usaha" class="col-sm-4 col-form-label">Nama Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" value="{{ old('nik', $umkm?->nama_usaha ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="jenis_usaha" class="col-sm-4 col-form-label">Jenis Usaha</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="jenis_usaha" id="jenis_usaha" value="{{ old('nik', $umkm?->jenis_usaha ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="nik" class="col-sm-4 col-form-label">Nomor Induk Kependudukan (NIK)</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik', $umkm?->nik ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="nib" class="col-sm-4 col-form-label">Nomor NIB / P-IRT/NPWP</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="nib" id="nib" value="{{ old('nik', $umkm?->nib ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="alamat_rumah" class="col-sm-4 col-form-label">Alamat Rumah</label>
                            <?php  $alamat_rumah = $umkm?->alamat_rumah." RT ".$umkm?->rt_rumah." RW ".$umkm?->rw_rumah." Desa/Keluarahan ".$umkm?->desa_rumah." Kecamatan ".$umkm?->kecamatan_rumah." Kabupaten/Kota".$umkm?->kabupaten_rumah." Provinsi ".$umkm?->provinsi_rumah." Kode Pos ".$umkm?->kode_pos_rumah;?>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" value="{{$umkm?->alamat_rumah}}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="alamat_usaha" class="col-sm-4 col-form-label">Alamat Usaha</label>
                            <div class="col-sm-12">
                              <?php  $alamat_usaha = $umkm?->alamat_usaha." RT ".$umkm?->rt_usaha." RW ".$umkm?->rw_usaha." Desa/Keluarahan ".$umkm?->desa_usaha." Kecamatan ".$umkm?->kecamatan_usaha." Kabupaten/Kota ".$umkm?->kabupaten_usaha." Provinsi ".$umkm?->provinsi_usaha." Kode Pos ".$umkm?->kode_pos_usaha;?>
                              <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" value="{{$umkm?->alamat_usaha}}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="modal" class="col-sm-4 col-form-label">Modal</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="modal" id="modal" value="{{ old('nik', $umkm?->modal ?? '') }}" disabled>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="jumlah_karyawan" class="col-sm-4 col-form-label">Jumlah Karyawan</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" name="jumlah_karyawan" id="jumlah_karyawan" min="0" value="{{ old('nik', $umkm?->jumlah_karyawan ?? '') }}" disabled>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-4 col-form-label">Email </label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="email" id="email" min="0" value="{{ old('nik', $umkm?->email ?? '') }}" disabled>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="no_hp" class="col-sm-4 col-form-label">No Handphone</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" name="no_hp" id="no_hp" min="0" value="{{ old('nik', $umkm?->no_hp ?? '') }}" disabled>
                            </div>
                          </div>
                    </div>

                </div>
                      
                <div class="text-center">
                  @if ($umkm?->email)
                  <a class="btn btn-primary" href="{{route('user.download-pdf')}}"><i class="bi bi-download"></i> Download PDF</a>
                  @else
                  <a class="btn btn-primary bg-70" href="#"><i class="bi bi-download"></i> Download PDF</a>
                  @endif
                </div>
            </div>
          </div>

        </div>
        
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Perhatian !!!</h4>
            <p>Harap Melengkapi data sebelum melakukan Download</p>   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    </section>

</main><!-- End #main -->
@endsection