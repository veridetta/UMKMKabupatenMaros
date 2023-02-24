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


          @if ($umkm==NULL or $umkm->status != 2)
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Formulir Pendaftaran UMKM Baru</h5>
                <!-- Vertical Form -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-4  " id="borderedTabJustified" role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="pilihan-sekolah-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pilihan-sekolah" type="button" role="tab" aria-controls="pilihan-sekolah" aria-selected="true">Pilihan Kecamatan</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-diri" type="button" role="tab" aria-controls="data-diri" aria-selected="true">Data UMKM</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-alamat" type="button" role="tab" aria-controls="data-alamat" aria-selected="false">Data Alamat UMKM</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-upload-foto" type="button" role="tab" aria-controls="upload-foto" aria-selected="false">Upload Foto</button>
                  </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                  <div class="tab-pane fade show active" id="bordered-justified-pilihan-sekolah" role="tabpanel" aria-labelledby="pilihan-sekolah-tab">
                      <form class="row g-3" action="{{route('user.umkm.updatePilihanKecamatan')}}" method="post">
                            @csrf
                            <!--@method('PUT')-->
                            <div class="col-12">
                              @if($umkm !==null)
                              <input type="hidden" id="id" name="id" value="{{$umkm->id}}"/>
                              @endif
                              <input type="hidden" id="users_id" name="users_id" value="{{Auth::id()}}"/>
                              <label for="kecamatan" class="form-label">Kecamatan</label>
                              <select class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan">
                                <option value="">Pilih Kecamatan</option>
                                <option value="BONTOA" {{ old('kecamatan', $umkm?->kecamatan) == 'BONTOA' ? 'selected' : '' }}>Bontoa</option>
                                <option value="CAMBA" {{ old('kecamatan', $umkm?->kecamatan) == 'CAMBA' ? 'selected' : '' }}>Camba</option>
                                <option value="CENRANA" {{ old('kecamatan', $umkm?->kecamatan) == 'CENRANA' ? 'selected' : '' }}>Cenrana</option>
                                <option value="LAU" {{ old('kecamatan', $umkm?->kecamatan) == 'LAU' ? 'selected' : '' }}>Lau</option>
                                <option value="MALLAWA" {{ old('kecamatan', $umkm?->kecamatan) == 'MALLAWA' ? 'selected' : '' }}>Mallawa</option>
                                <option value="MANDAI" {{ old('kecamatan', $umkm?->kecamatan) == 'MANDAI' ? 'selected' : '' }}>Mandai</option>
                                <option value="MAROS BARU" {{ old('kecamatan', $umkm?->kecamatan) == 'MAROS BARU' ? 'selected' : '' }}>Maros Baru</option>
                                <option value="MARUSU" {{ old('kecamatan', $umkm?->kecamatan) == 'MARUSU' ? 'selected' : '' }}>Marusu</option>
                                <option value="MONCONGLOE" {{ old('kecamatan', $umkm?->kecamatan) == 'MONCONGLOE' ? 'selected' : '' }}>Moncongloe</option>
                                <option value="SIMBANG" {{ old('kecamatan', $umkm?->kecamatan) == 'SIMBANG' ? 'selected' : '' }}>Simbang</option>
                                <option value="TANRALILI" {{ old('kecamatan', $umkm?->kecamatan) == 'TANRALILI' ? 'selected' : '' }}>Tanralili</option>
                                <option value="TOMPOBULU" {{ old('kecamatan', $umkm?->kecamatan) == 'TOMPOBULU' ? 'selected' : '' }}>Tompobulu</option>
                                <option value="TURIKALE" {{ old('kecamatan', $umkm?->kecamatan) == 'TURIKALE' ? 'selected' : '' }}>Turikale</option>

                              </select>
                              @if ($errors->has('kecamatan'))
                                <p class="text-danger">{{ $errors->first('kecamatan') }}</p>
                              @endif
                            </div>
                             
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                  </div>
                  <div class="tab-pane fade show" id="bordered-justified-data-diri" role="tabpanel" aria-labelledby="data-diri-tab">
                    <form  class="row g-3" action="{{route('user.umkm.update',$umkm? $umkm->id :'1000000')}}" method="post">
                      @csrf
                      @method('PUT')
                      @if($umkm !==null)
                        <input type="hidden" id="id" name="id" value="{{$umkm->id}}"/>
                      @endif
                      
                      <input type="hidden" id="users_id" name="users_id" value="{{Auth::id()}}"/>
                      <form method="POST" action="/form">
                        @csrf
                        <div class="mb-3">
                          <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                          <input type="text" class="form-control {{$errors->has('nama_pemilik') ? 'is-invalid' : ''}}" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') ?: $umkm?->nama_pemilik }}">
                          @if ($errors->has('nama_pemilik'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nama_pemilik') }}</strong>
                            </span>
                          @endif
                        </div>
                      
                        <div class="mb-3">
                          <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                          <input type="text" class="form-control {{$errors->has('tempat_lahir') ? 'is-invalid' : ''}}" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?: $umkm?->tempat_lahir }}">
                          @if ($errors->has('tempat_lahir'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tempat_lahir') }}</strong>
                            </span>
                          @endif
                        </div>
                      
                        <div class="mb-3">
                          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                          <input type="date" class="form-control {{$errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?: $umkm?->tanggal_lahir }}">
                          @if ($errors->has('tanggal_lahir'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                            </span>
                          @endif
                        </div>
                      
                        <div class="mb-3">
                          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                          <select class="form-control {{$errors->has('jenis_kelamin') ? 'is-invalid' : ''}}" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin',$umkm?->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin',$umkm?->jenis_kelamin)  == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                          </select>
                          @if ($errors->has('jenis_kelamin'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            </span>
                          @endif
                        </div>
                      
                        <div class="mb-3">
                          <label for="agama" class="form-label">Agama</label>
                          <select class="form-control {{$errors->has('agama') ? 'is-invalid' : ''}}" id="agama" name="agama">
                            <option value="">Pilih Agama</option>
                            <option value="Islam" {{ old('agama',$umkm?->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama',$umkm?->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama',$umkm?->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama',$umkm?->agama)== 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama',$umkm?->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Kong Hu Cu" {{ old('agama',$umkm?->agama) == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                            <option value="lainnya" {{ old('agama',$umkm?->agama) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @if ($errors->has('agama'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('agama') }}</strong>
                            </span>
                            @endif
                            
                        </div>
                        <div class="mb-3">
                          <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                          <select class="form-select {{$errors->has('kewarganegaraan') ? 'is-invalid' : ''}}" id="kewarganegaraan" name="kewarganegaraan">
                            <option value="">-- Pilih Kewarganegaraan --</option>
                            <option value="WNI" {{ old('kewarganegaraan',$umkm?->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ old('kewarganegaraan',$umkm?->kewarganegaraan)  == 'WNA' ? 'selected' : '' }}>WNA</option>
                          </select>
                          @if ($errors->has('kewarganegaraan'))
                            <div class="invalid-feedback">
                              {{$errors->first('kewarganegaraan')}}
                            </div>
                          @endif
                        </div>
                        
                        <div class="mb-3">
                          <label for="nama_usaha" class="form-label">Nama Usaha</label>
                          <input type="text" class="form-control {{$errors->has('nama_usaha') ? 'is-invalid' : ''}}" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha') ?: $umkm?->nama_usaha }}">
                          @if ($errors->has('nama_usaha'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nama_usaha') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                          <input type="text" class="form-control {{$errors->has('jenis_usaha') ? 'is-invalid' : ''}}" id="jenis_usaha" name="jenis_usaha" value="{{ old('jenis_usaha') ?: $umkm?->jenis_usaha }}">
                          @if ($errors->has('jenis_usaha'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jenis_usaha') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                          <input type="text" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}" id="nik" name="nik" value="{{ old('nik') ?: $umkm?->nik }}">
                          @if ($errors->has('nik'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nik') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="nib" class="form-label">Nomor NIB / P-IRT / NPWP</label>
                          <input type="text" class="form-control {{$errors->has('nib') ? 'is-invalid' : ''}}" id="nib" name="nib" value="{{ old('nib') ?: $umkm?->nib }}">
                          @if ($errors->has('nib'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nib') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="modal" class="form-label">Modal</label>
                          <input type="text" class="form-control {{$errors->has('modal') ? 'is-invalid' : ''}}" id="modal" name="modal" value="{{ old('modal') ?: $umkm?->modal }}">
                          @if ($errors->has('modal'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('modal') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan</label>
                          <input type="text" class="form-control {{$errors->has('jumlah_karyawan') ? 'is-invalid' : ''}}" id="jumlah_karyawan" name="jumlah_karyawan" value="{{ old('jumlah_karyawan') ?: $umkm?->jumlah_karyawan }}">
                          @if ($errors->has('jumlah_karyawan'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('jumlah_karyawan') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="tanggal_mulai_usaha" class="form-label">Tanggal Mulai Usaha</label>
                          <input type="date" class="form-control {{$errors->has('tanggal_mulai_usaha') ? 'is-invalid' : ''}}" id="tanggal_mulai_usaha" name="tanggal_mulai_usaha" value="{{ old('tanggal_mulai_usaha') ?: $umkm?->tanggal_mulai_usaha }}">
                          @if ($errors->has('tanggal_mulai_usaha'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tanggal_mulai_usaha') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ old('email') ?: $umkm?->email }}">
                          @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="mb-3">
                          <label for="no_hp" class="form-label">No Handphone</label>
                          <input type="text" class="form-control {{$errors->has('no_hp') ? 'is-invalid' : ''}}" id="no_hp" name="no_hp" value="{{ old('no_hp') ?: $umkm?->no_hp }}">
                          @if ($errors->has('no_hp'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('no_hp') }}</strong>
                            </span>
                          @endif
                        </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- Vertical Form -->
                  </div>
                  <div class="tab-pane fade" id="bordered-justified-data-alamat" role="tabpanel" aria-labelledby="data-alamat-tab">
                    <form  class="row g-3" action="{{route('user.umkm.updateDataAlamat')}}" method="post">
                      @csrf
                      <!--@method('PUT')-->
                      @if($umkm !==null)
                        <input type="hidden" id="id" name="id" value="{{$umkm->id}}"/>
                      @endif
                      <input type="hidden" id="users_id" name="users_id" value="{{Auth::id()}}"/>
                      <div class="col-12 row">
                        <label for="alamat" class="form-label"><b>Alamat Rumah</b></label>
                        <div class="col-12">
                          <label for="alamat_rumah" class="form-label">Alamat</label>
                          <input type="text" class="form-control {{$errors->has('alamat_rumah') ? 'is-invalid' : ''}}" id="" name="alamat_rumah" value="{{old('alamat_rumah') ?: $umkm?->alamat_rumah}}">
                          @if ($errors->has('alamat_rumah'))
                                <p class="text-danger">{{$errors->first('alamat_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-6">
                          <label for="rt_rumah" class="form-label">RT</label>
                          <input type="number" class="form-control {{$errors->has('rt_rumah') ? 'is-invalid' : ''}}" id="" name="rt_rumah" value="{{old('rt_rumah') ?: $umkm?->rt_rumah}}">
                          @if ($errors->has('rt_rumah'))
                                  <p class="text-danger">{{$errors->first('rt_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-6">
                          <label for="rw_rumah" class="form-label">RW</label>
                          <input type="number" class="form-control {{$errors->has('rw_rumah') ? 'is-invalid' : ''}}" id="" name="rw_rumah" value="{{old('rw_rumah') ?: $umkm?->rw_rumah}}">
                          @if ($errors->has('rw_rumah'))
                                  <p class="text-danger">{{$errors->first('rw')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="desa_rumah" class="form-label">Kelurahan / Desa</label>
                          <input type="text" class="form-control {{$errors->has('desa_rumah') ? 'is-invalid' : ''}}" id="" name="desa_rumah" value="{{old('desa_rumah') ?: $umkm?->desa_rumah}}">
                          @if ($errors->has('desa_rumah'))
                              <p class="text-danger">{{$errors->first('desa_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kecamatan_rumah" class="form-label">Kecamatan</label>
                          <input type="text" class="form-control {{$errors->has('kecamatan_rumah') ? 'is-invalid' : ''}}" id="" name="kecamatan_rumah" value="{{old('kecamatan_rumah') ?: $umkm?->kecamatan_rumah}}">
                          @if ($errors->has('kecamatan_rumah'))
                                    <p class="text-danger">{{$errors->first('kecamatan_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kabupaten_rumah" class="form-label">Kabupaten/Kota</label>
                          <input type="text" class="form-control {{$errors->has('kabupaten_rumah') ? 'is-invalid' : ''}}" id="" name="kabupaten_rumah" value="{{old('kabupaten_rumah') ?: $umkm?->kabupaten_rumah}}">
                          @if ($errors->has('kabupaten_rumah'))
                                    <p class="text-danger">{{$errors->first('kabupaten_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="provinsi_rumah" class="form-label">Provinsi</label>
                          <input type="text" class="form-control {{$errors->has('provinsi_rumah') ? 'is-invalid' : ''}}" id="" name="provinsi_rumah" value="{{old('provinsi_rumah') ?: $umkm?->provinsi_rumah}}">
                          @if ($errors->has('provinsi_rumah'))
                                    <p class="text-danger">{{$errors->first('provinsi_rumah')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kode_pos_rumah" class="form-label">Kode Pos</label>
                          <input type="number" class="form-control {{$errors->has('kode_pos_rumah') ? 'is-invalid' : ''}}" id="" name="kode_pos_rumah" value="{{old('kode_pos_rumah') ?: $umkm?->kode_pos_rumah}}">
                          @if ($errors->has('kode_pos_rumah'))
                              <p class="text-danger">{{$errors->first('kode_pos_rumah')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      <div class="col-12  row">
                        <label for="alamat" class="form-label"><b>Alamat Usaha</b></label>
                        <div class="col-12">
                          <label for="alamat_usaha" class="form-label">Alamat</label>
                          <input type="text" class="form-control {{$errors->has('alamat_usaha') ? 'is-invalid' : ''}}" id="" name="alamat_usaha" value="{{old('alamat_usaha') ?: $umkm?->alamat_usaha}}">
                          @if ($errors->has('alamat_usaha'))
                                <p class="text-danger">{{$errors->first('alamat_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-6">
                          <label for="rt_usaha" class="form-label">RT</label>
                          <input type="number" class="form-control {{$errors->has('rt_usaha') ? 'is-invalid' : ''}}" id="" name="rt_usaha" value="{{old('rt_usaha') ?: $umkm?->rt_usaha}}">
                          @if ($errors->has('rt_usaha'))
                                  <p class="text-danger">{{$errors->first('rt_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-6">
                          <label for="rw_usaha" class="form-label">RW</label>
                          <input type="number" class="form-control {{$errors->has('rw_usaha') ? 'is-invalid' : ''}}" id="" name="rw_usaha" value="{{old('rw_usaha') ?: $umkm?->rw_usaha}}">
                          @if ($errors->has('rw_usaha'))
                                  <p class="text-danger">{{$errors->first('rw')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="desa_usaha" class="form-label">Kelurahan / Desa</label>
                          <input type="text" class="form-control {{$errors->has('desa_usaha') ? 'is-invalid' : ''}}" id="" name="desa_usaha" value="{{old('desa_usaha') ?: $umkm?->desa_usaha}}">
                          @if ($errors->has('desa_usaha'))
                              <p class="text-danger">{{$errors->first('desa_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kecamatan_usaha" class="form-label">Kecamatan</label>
                          <input type="text" class="form-control {{$errors->has('kecamatan_usaha') ? 'is-invalid' : ''}}" id="" name="kecamatan_usaha" value="{{old('kecamatan_usaha') ?: $umkm?->kecamatan_usaha}}">
                          @if ($errors->has('kecamatan_usaha'))
                                    <p class="text-danger">{{$errors->first('kecamatan_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kabupaten_usaha" class="form-label">Kabupaten/Kota</label>
                          <input type="text" class="form-control {{$errors->has('kabupaten_usaha') ? 'is-invalid' : ''}}" id="" name="kabupaten_usaha" value="{{old('kabupaten_usaha') ?: $umkm?->kabupaten_usaha}}">
                          @if ($errors->has('kabupaten_usaha'))
                                    <p class="text-danger">{{$errors->first('kabupaten_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="provinsi_usaha" class="form-label">Provinsi</label>
                          <input type="text" class="form-control {{$errors->has('provinsi_usaha') ? 'is-invalid' : ''}}" id="" name="provinsi_usaha" value="{{old('provinsi_usaha') ?: $umkm?->provinsi_usaha}}">
                          @if ($errors->has('provinsi_usaha'))
                                    <p class="text-danger">{{$errors->first('provinsi_usaha')}}</p>
                          @endif
                        </div>
                        <div class="col-12">
                          <label for="kode_pos_usaha" class="form-label">Kode Pos</label>
                          <input type="number" class="form-control {{$errors->has('kode_pos_usaha') ? 'is-invalid' : ''}}" id="" name="kode_pos_usaha" value="{{old('kode_pos_usaha') ?: $umkm?->kode_pos_usaha}}">
                          @if ($errors->has('kode_pos_usaha'))
                              <p class="text-danger">{{$errors->first('kode_pos_usaha')}}</p>
                          @endif
                        </div>
                        
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- Vertical Form -->
                  </div>
                  <div class="tab-pane fade" id="bordered-justified-upload-foto" role="tabpanel" aria-labelledby="uploadfoto-tab">
                    {{-- css content center --}}
                    <div class="d-flex justify-content-center">
                      @if($umkm!==null)
                        @if ($umkm->foto)
                          <img src="{{asset('storage/'.$umkm->foto)}}" alt="foto" class="img-circle" style="border-radius: 200px" width="200px" height="200px">
                          @else
                          <img src="https://ui-avatars.com/api/?name=hendra" alt="" class="img-fluid" style="border-radius: 200px" width="200px" height="200px">
                          @endif
                      @else
                        <img src="https://ui-avatars.com/api/?name=hendra" alt="" class="img-fluid" style="border-radius: 200px" width="200px" height="200px">
                      @endif
                    </div>
                    <form class="row g-3" action="{{route('user.umkm.uploadFoto')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <!--@method('PUT')-->
                      @if($umkm !==null)
                              <input type="hidden" id="id" name="id" value="{{$umkm->id}}"/>
                              @endif
                      <div class="col-12">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-12">
                          <input class="form-control" type="file" name="foto" id="formFile">
                          @if ($errors->has('foto'))
                            <p class="text-danger">{{$errors->first('foto')}}</p>
                        @endif
                        </div>
                      </div>   
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Foto</button>
                      </div>
                  </form>
                  </div>
              </div><!-- End Bordered Tabs Justified -->
              </div>
            </div>
          @else
             <div class="alert alert-info  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
                <p class="mb-0">Selamat pendaftaran anda telah berhasil</p> 
                <hr>
                <div class="row d-flex justify-content-center">
                  <div class="col-md-4 text-center">
                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">1</button>
                    <h5 class="mt-2">Formulir</h5>
                    <a class="btn btn-success btn-sm rounded-pill" href="{{route('user.download-pdf')}}"><i class="bi bi-download"></i> Download</a>
                  </div>
                  <div class="col-md-4 text-center">
                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">2</button>
                    <h5 class="mt-2">Formulir Pendaftaran</h5>
                    <a class="btn btn-success btn-sm rounded-pill" href="{{route('user.show-pdf')}}"><i class="bi bi-eye-fill"></i> Lihat formulir</a>
                  </div>
                  <div class="col-sm-4 text-center">
                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">3</button>
                    <h5 class="mt-2">Berkas Lainnya</h5>
                    <a class="btn btn-secondary btn-sm rounded-pill" href="{{route('user.umkm.download_all')}}"><i class="bi bi-download"></i> Download Berkas</a>
                  </div>
                </div>
              </div>
          @endif
          


        </div>
      </div>
    </section>

</main><!-- End #main -->
<script>
  var button = document.getElementById("koordinat")
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert('Geolocation is not supported by this browser.')
    }
  }
  function showPosition(position) {
    button.value = position.coords.latitude + "," + position.coords.longitude;
  }
</script>
@endsection