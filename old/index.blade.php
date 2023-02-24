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


          @if ($siswa->status != 2)
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Formulir Pendaftaran Siswa Baru</h5>
                <!-- Vertical Form -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-4  " id="borderedTabJustified" role="tablist">
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="pilihan-sekolah-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pilihan-sekolah" type="button" role="tab" aria-controls="pilihan-sekolah" aria-selected="true">Pilihan Sekolah</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-diri" type="button" role="tab" aria-controls="data-diri" aria-selected="true">Data Diri</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-alamat" type="button" role="tab" aria-controls="data-alamat" aria-selected="false">Data Alamat</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-orangtua" type="button" role="tab" aria-controls="orang-tua" aria-selected="false">Orang Tua</button>
                  </li>
                  <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-upload-foto" type="button" role="tab" aria-controls="upload-foto" aria-selected="false">Upload Foto</button>
                  </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                  <div class="tab-pane fade show active" id="bordered-justified-pilihan-sekolah" role="tabpanel" aria-labelledby="pilihan-sekolah-tab">
                      <form class="row g-3" action="{{route('user.siswa.updatePilihanSekolah',$siswa->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                              <label class="form-label">Pilihan Sekolah</label> 
                                <select class="form-select" aria-label="Default select example" name="sekolahs_id">
                                  {{-- <option value="Laki-Laki" {{($siswa->jenis_kelamin === 'Laki-Laki') ? 'selected' : ''}}>Laki-Laki</option>
                                  <option value="Perempuan" {{($siswa->jenis_kelamin === 'Perempuan') ? 'selected' : ''}}>Perempuan</option> --}}
                                  @foreach ($sekolah as $rows )
                                    <option value={{$rows->id}} {{($rows->id === $siswa->sekolahs_id) ? 'selected' : ''}}>{{$rows->nama_sekolah}}</option>
                                  @endforeach
                                </select>  
                                @if ($errors->has('sekolahs_id'))
                                    <p class="text-danger">{{$errors->first('sekolahs_id')}}</p>
                                @endif
                            </div>  
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                  </div>
                  <div class="tab-pane fade show" id="bordered-justified-data-diri" role="tabpanel" aria-labelledby="data-diri-tab">
                    <form  class="row g-3" action="{{route('user.siswa.update',$siswa->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden"name="id" value="{{$siswa->id}}">
                      <div class="col-12">
                        <label for="no_pendaftaran" class="form-label">No Pendaftaran</label>
                        <input type="text" name="no_pendaftaran" class="form-control {{$errors->has('no_pendaftaran') ? 'is-invalid' : ''}}" id="" value="{{old('no_pendaftaran') ?: $siswa->no_pendaftaran}}" disabled>
                        @if ($errors->has('no_pendaftaran'))
                                  <p class="text-danger">{{$errors->first('no_pendaftaran')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                        <input type="text"  class="form-control {{$errors->has('asal_sekolah') ? 'is-invalid' : ''}}" id="" name="asal_sekolah"  value="{{old('asal_sekolah') ?: $siswa->asal_sekolah}}">
                        @if ($errors->has('asal_sekolah'))
                            <p class="text-danger">{{$errors->first('asal_sekolah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="npsn_asal_sekolah" class="form-label">NPSN Sekolah Asal</label>
                        <input type="number" class="form-control {{$errors->has('npsn_asal_sekolah') ? 'is-invalid' : ''}}" id="inputPassword4" name="npsn_asal_sekolah"  value="{{old('npsn_asal_sekolah') ?: $siswa->npsn_asal_sekolah}}">
                        @if ($errors->has('npsn_asal_sekolah'))
                            <p class="text-danger">{{$errors->first('npsn_asal_sekolah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" class="form-control {{$errors->has('nisn') ? 'is-invalid' : ''}}" id="" name="nisn" value="{{old('nisn') ?: $siswa->nisn}}" disabled>
                        @if ($errors->has('nisn'))
                                  <p class="text-danger">{{$errors->first('nisn')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control {{$errors->has('nik') ? 'is-invalid' : ''}}" id="" name="nik" value="{{old('nik') ?: $siswa->nik}}" maxlength="16" min="16">
                        @if ($errors->has('nik'))
                                <p class="text-danger">{{$errors->first('nik')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Kewernegaraan</label> 
                          <select class="form-select" aria-label="Default select example" name="kewernegaraan" >
                            <option  value="WNI" {{($siswa->kewernegaraan === 'WNI') ? 'selected' : ''}}>WNI</option>
                            <option value="WNA" {{($siswa->kewernegaraan === 'WNA') ? 'selected' : ''}}>WNA</option>
                          </select>  
                          @if ($errors->has('kewernegaraan'))
                              <p class="text-danger">{{$errors->first('kewernegaraan')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="" name="nama_lengkap" value="{{old('nama_lengkap') ?: $siswa->nama_lengkap}}">
                        @if ($errors->has('nama_lengkap'))
                            <p class="text-danger">{{$errors->first('nama_lengkap')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control {{$errors->has('tempat') ? 'is-invalid' : ''}}" id="" name="tempat" value="{{old('tempat') ?: $siswa->tempat}}">
                        @if ($errors->has('tempat'))
                                  <p class="text-danger">{{$errors->first('tempat')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control {{$errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" id="" name="tanggal_lahir" value="{{old('tanggal_lahir') ?: $siswa->tanggal_lahir}}">
                        @if ($errors->has('tanggal_lahir'))
                              <p class="text-danger">{{$errors->first('tanggal_lahir')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Jenis Kelamin</label> 
                          <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                            <option value="Laki-Laki" {{($siswa->jenis_kelamin === 'Laki-Laki') ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan" {{($siswa->jenis_kelamin === 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                          </select>  
                          @if ($errors->has('jenis_kelamin'))
                              <p class="text-danger">{{$errors->first('jenis_kelamin')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="anak_dari" class="form-label">Anak Ke</label>
                        <input type="number" class="form-control {{$errors->has('anak_dari') ? 'is-invalid' : ''}}" id="" name="anak_dari" value="{{old('anak_dari') ?: $siswa->anak_dari}}">
                        @if ($errors->has('anak_dari'))
                            <p class="text-danger">{{$errors->first('anak_dari')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                        <input type="number" class="form-control {{$errors->has('jumlah_saudara') ? 'is-invalid' : ''}}" id="" name="jumlah_saudara" value="{{old('anak_dari') ?: $siswa->anak_dari}}">
                        @if ($errors->has('jumlah_saudara'))
                            <p class="text-danger">{{$errors->first('jumlah_saudara')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="agama">
                            <option value="Islam" {{($siswa->agama === 'Islam') ? 'selected' : ''}}>Islam</option>
                            <option value="Kristen" {{($siswa->agama === 'Kristen') ? 'selected' : ''}}>Kristen</option>
                            <option value="Katholik" {{($siswa->agama === 'Katholik') ? 'selected' : ''}}>Katholik</option>
                            <option value="Budha" {{($siswa->agama === 'Budha') ? 'selected' : ''}}>Budha</option>
                            <option value="Hindu" {{($siswa->agama === 'Hindu') ? 'selected' : ''}}>Hindu</option>
                            <option value="Khong Hucu" {{($siswa->agama === 'Khong Hucu') ? 'selected' : ''}}>Khong Hucu</option>
                        </select> 
                        @if ($errors->has('agama'))
                            <p class="text-danger">{{$errors->first('agama')}}</p>
                        @endif 
                      </div>
                      <div class="col-12">
                        <label for="cita_cita" class="form-label">Cita-cita</label>
                        <select class="form-select" aria-label="Default select example" name="cita_cita">
                            <option value="PNS" {{($siswa->cita_cita === 'PNS') ? 'selected' : ''}}>PNS</option>
                            <option value="TNI/Polri" {{($siswa->cita_cita === 'TNI/Polri') ? 'selected' : ''}}>TNI/Polri</option>
                            <option value="Guru/Dosen" {{($siswa->cita_cita === 'Guru/Dosen') ? 'selected' : ''}}>Guru/Dosen</option>
                            <option value="Dokter" {{($siswa->cita_cita === 'Dokter') ? 'selected' : ''}}>Dokter</option>
                            <option value="Politikus" {{($siswa->cita_cita === 'Politikus') ? 'selected' : ''}}>Politikus</option>
                            <option value="Wiraswasta" {{($siswa->cita_cita === 'Wiraswasta') ? 'selected' : ''}}>Wiraswasta</option>
                            <option value="Seniman/Artis" {{($siswa->cita_cita === 'Seniman/Artis') ? 'selected' : ''}}>Seniman/Artis</option>
                            <option value="Ilmuwan" {{($siswa->cita_cita === 'Ilmuwan') ? 'selected' : ''}}>Ilmuwan</option>
                            <option value="Agamawan" {{($siswa->cita_cita === 'Agamawan') ? 'selected' : ''}}>Agamawan</option>
                            <option value="Lainnya" {{($siswa->cita_cita === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select> 
                          @if ($errors->has('cita_cita'))
                              <p class="text-danger">{{$errors->first('cita_cita')}}</p>
                          @endif 
                      </div>
                      <div class="col-12">
                        <label for="hobi" class="form-label">hobi</label>
                        <select class="form-select" aria-label="Default select example" name="hobi">
                            <option value="Olahraga" {{($siswa->hobi === 'Olahraga') ? 'selected' : ''}}>Olahraga</option>
                            <option value="Keseniaan" {{($siswa->hobi === 'Keseniaan') ? 'selected' : ''}}>Keseniaan</option>
                            <option value="Membaca" {{($siswa->hobi === 'Membaca') ? 'selected' : ''}}>Membaca</option>
                            <option value="Menulis" {{($siswa->hobi === 'Menulis') ? 'selected' : ''}}>Menulis</option>
                            <option value="Jalan-jalan" {{($siswa->hobi === 'Jalan-jalan') ? 'selected' : ''}}>Jalan-jalan</option>
                            <option value="Lainnya" {{($siswa->hobi === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select> 
                          @if ($errors->has('hobi'))
                              <p class="text-danger">{{$errors->first('hobi')}}</p>
                            @endif
                      </div>
                      <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="" name="email" value="{{old('email') ?: $siswa->email}}">
                        @if ($errors->has('email'))
                              <p class="text-danger">{{$errors->first('email')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="handphone" class="form-label">No Handphone</label>
                        <input type="number" class="form-control {{$errors->has('handphone') ? 'is-invalid' : ''}}" id="" name="handphone" value="{{old('handphone') ?: $siswa->handphone}}">
                        @if ($errors->has('handphone'))
                              <p class="text-danger">{{$errors->first('handphone')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="biaya_sekolah" class="form-label">Yang Membiayai Sekolah</label>
                        <select class="form-select" aria-label="Default select example" name="biaya_sekolah" value="{{old('biaya_sekolah') ?: $siswa->biaya_sekolah}}">
                            <option value="Orang Tua" {{($siswa->biaya_sekolah === 'Orang Tua') ? 'selected' : ''}}>Orang Tua</option>
                            <option value="Wali/Orang Tua Asuh" {{($siswa->biaya_sekolah === 'Wali/Orang Tua Asuh') ? 'selected' : ''}}>Wali/Orang Tua Asuh</option>
                            <option value="Tanggungan Sendiri" {{($siswa->biaya_sekolah === 'Tanggungan Sendiri') ? 'selected' : ''}}>Tanggungan Sendiri</option>
                            <option value="Lainnya" {{($siswa->biaya_sekolah === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('biaya_sekolah'))
                              <p class="text-danger">{{$errors->first('biaya_sekolah')}}</p>
                            @endif
                      </div>
                      <div class="col-12">
                        <label for="paud" class="form-label">Pernah Paud</label>
                        <select class="form-select" aria-label="Default select example" name="paud">
                            <option value="1" {{($siswa->paud === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->paud === '0') ? 'selected' : ''}}>Tidak</option>
                        </select> 
                        @if ($errors->has('paud'))
                              <p class="text-danger">{{$errors->first('paud')}}</p>
                          @endif 
                      </div>
                      <div class="col-12">
                        <label for="tk" class="form-label">Pernah TK</label>
                        <select class="form-select" aria-label="Default select example" name="tk">
                            <option value="1" {{($siswa->tk === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->tk === '0') ? 'selected' : ''}}>Tidak</option>
                        </select>  
                        @if ($errors->has('tk'))
                              <p class="text-danger">{{$errors->first('tk')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="hepatitis" class="form-label">Imunisasi Hepatitis B</label>
                        <select class="form-select" aria-label="Default select example" name="hepatitis">
                            <option value="1" {{($siswa->hepatitis === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->hepatitis === '0') ? 'selected' : ''}}>Tidak</option>
                        </select> 
                        @if ($errors->has('hepatitis'))
                              <p class="text-danger">{{$errors->first('hepatitis')}}</p>
                        @endif 
                      </div>
                      <div class="col-12">
                        <label for="polio" class="form-label">Imunisasi Polio</label>
                        <select class="form-select" aria-label="Default select example" name="polio">
                            <option value="1" {{($siswa->polio === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->polio === '0') ? 'selected' : ''}}>Tidak</option>
                          </select>  
                          @if ($errors->has('polio'))
                              <p class="text-danger">{{$errors->first('polio')}}</p>
                            @endif
                      </div>
                      <div class="col-12">
                        <label for="bcg" class="form-label">Imunisasi BCG</label>
                        <select class="form-select" aria-label="Default select example" name="bcg">
                            <option value="1" {{($siswa->bcg === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->bcg === '0') ? 'selected' : ''}}>Tidak</option>
                          </select>  
                          @if ($errors->has('bcg'))
                              <p class="text-danger">{{$errors->first('bcg')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="campak" class="form-label">Imunisasi Campak</label>
                        <select class="form-select" aria-label="Default select example" name="campak">
                            <option value="1" {{($siswa->campak === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->campak === '0') ? 'selected' : ''}}>Tidak</option>
                        </select>  
                        @if ($errors->has('campak'))
                            <p class="text-danger">{{$errors->first('campak')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="dpt" class="form-label">Imunisasi DPT</label>
                        <select class="form-select" aria-label="Default select example" name="dpt">
                            <option value="1" {{($siswa->dpt === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->dpt === '0') ? 'selected' : ''}}>Tidak</option>
                        </select>  
                        @if ($errors->has('dpt'))
                              <p class="text-danger">{{$errors->first('dpt')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="covid" class="form-label">Imunisasi Covid</label>
                        <select class="form-select" aria-label="Default select example" name="covid">
                            <option value="1" {{($siswa->covid === '1') ? 'selected' : ''}}>YA</option>
                            <option value="0" {{($siswa->covid === '0') ? 'selected' : ''}}>Tidak</option>
                          </select>  
                          @if ($errors->has('covid'))
                              <p class="text-danger">{{$errors->first('covid')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="no_kip" class="form-label">No KIP</label>
                        <input type="number" class="form-control {{$errors->has('no_kip') ? 'is-invalid' : ''}}" id="" name="no_kip" value="{{old('no_kip') ?: $siswa->no_kip}}">
                        @if ($errors->has('no_kip'))
                              <p class="text-danger">{{$errors->first('no_kip')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="no_kk" class="form-label">No KK</label>
                        <input type="number" class="form-control {{$errors->has('no_kk') ? 'is-invalid' : ''}}" id="" name="no_kk" value="{{old('no_kk') ?: $siswa->no_kk}}"  maxlength="16" min="16">
                        @if ($errors->has('no_kk'))
                              <p class="text-danger">{{$errors->first('no_kk')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="kepala_keluarga" class="form-label">Nama Kepala Keluarga</label>
                        <input type="text" class="form-control {{$errors->has('kepala_keluarga') ? 'is-invalid' : ''}}" id="" name="kepala_keluarga" value="{{old('kepala_keluarga') ?: $siswa->kepala_keluarga}}">
                        @if ($errors->has('kepala_keluarga'))
                              <p class="text-danger">{{$errors->first('kepala_keluarga')}}</p>
                        @endif
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- Vertical Form -->
                  </div>
                  <div class="tab-pane fade" id="bordered-justified-data-alamat" role="tabpanel" aria-labelledby="data-alamat-tab">
                    <form  class="row g-3" action="{{route('user.siswa.updateDataAlamat',$siswa->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden"name="id" value="{{$siswa->id}}">
                      <div class="col-12">
                        <label class="form-label">Status Tempat Tinggal</label> 
                          <select class="form-select" aria-label="Default select example" name="stts_tempat_tinggal">
                            <option value="Tinggal dengan orang tua/wali" {{($siswa->stts_tempat_tinggal === 'Tinggal dengan orang tua/wali') ? 'selected' : ''}}>Tinggal dengan orang tua/wali</option>
                            <option value="Ikut saudara atau kerabat" {{($siswa->stts_tempat_tinggal === 'Ikut saudara atau kerabat') ? 'selected' : ''}}>Ikut saudara atau kerabat</option>
                            <option value="Asrama atau Madrasah" {{($siswa->stts_tempat_tinggal === 'Asrama atau Madrasah') ? 'selected' : ''}}>Asrama atau Madrasah</option>
                            <option value="Kontrak/Kost" {{($siswa->stts_tempat_tinggal === 'Kontrak/Kost') ? 'selected' : ''}}>Kontrak/Kost</option>
                            <option value="Tinggal di asrama pesantren" {{($siswa->stts_tempat_tinggal === 'Tinggal di asrama pesantren') ? 'selected' : ''}}>Tinggal di asrama pesantren</option>
                            <option value="Panti Asuhan" {{($siswa->stts_tempat_tinggal === 'Panti Asuhan') ? 'selected' : ''}}>Panti Asuhan</option>
                            <option value="Rumah Singgah" {{($siswa->stts_tempat_tinggal === 'Rumah Singgah') ? 'selected' : ''}}>Rumah Singgah</option>
                            <option value="Lainnya" {{($siswa->stts_tempat_tinggal === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('stts_tempat_tinggal'))
                                  <p class="text-danger">{{$errors->first('stts_tempat_tinggal')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="" name="alamat" value="{{old('alamat') ?: $siswa->alamat}}">
                        @if ($errors->has('alamat'))
                              <p class="text-danger">{{$errors->first('alamat')}}</p>
                        @endif
                      </div>
                      <div class="col-6">
                        <label for="rt" class="form-label">RT</label>
                        <input type="number" class="form-control {{$errors->has('rt') ? 'is-invalid' : ''}}" id="" name="rt" value="{{old('rt') ?: $siswa->rt}}">
                        @if ($errors->has('rt'))
                                <p class="text-danger">{{$errors->first('rt')}}</p>
                        @endif
                      </div>
                      <div class="col-6">
                        <label for="rw" class="form-label">RW</label>
                        <input type="number" class="form-control {{$errors->has('rw') ? 'is-invalid' : ''}}" id="" name="rw" value="{{old('rw') ?: $siswa->rw}}">
                        @if ($errors->has('rw'))
                                <p class="text-danger">{{$errors->first('rw')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="desa" class="form-label">Desa</label>
                        <input type="text" class="form-control {{$errors->has('desa') ? 'is-invalid' : ''}}" id="" name="desa" value="{{old('desa') ?: $siswa->desa}}">
                        @if ($errors->has('desa'))
                            <p class="text-danger">{{$errors->first('desa')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="" name="kecamatan" value="{{old('kecamatan') ?: $siswa->kecamatan}}">
                        @if ($errors->has('kecamatan'))
                                  <p class="text-danger">{{$errors->first('kecamatan')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control {{$errors->has('kabupaten') ? 'is-invalid' : ''}}" id="" name="kabupaten" value="{{old('kabupaten') ?: $siswa->kabupaten}}">
                        @if ($errors->has('kabupaten'))
                                  <p class="text-danger">{{$errors->first('kabupaten')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="" name="provinsi" value="{{old('provinsi') ?: $siswa->provinsi}}">
                        @if ($errors->has('provinsi'))
                                  <p class="text-danger">{{$errors->first('provinsi')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="number" class="form-control {{$errors->has('kode_pos') ? 'is-invalid' : ''}}" id="" name="kode_pos" value="{{old('kode_pos') ?: $siswa->kode_pos}}">
                        @if ($errors->has('kode_pos'))
                                  <p class="text-danger">{{$errors->first('kode_pos')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="koordinat_alamat" class="form-label">Koordinat Alamat</label>
                        <input id="koordinat" type="text" class="form-control {{$errors->has('koordinat_alamat') ? 'is-invalid' : ''}}" id="" name="koordinat_alamat" value="{{old('koordinat_alamat') ?: $siswa->koordinat_alamat}}" placeholder="Contoh penulisan -5.15078,119.452467">
                        @if ($errors->has('koordinat_alamat'))
                                  <p class="text-danger">{{$errors->first('koordinat_alamat')}}</p>
                        @endif
                        <div class="text-end mt-3">
                          <button type="button" class="btn btn-primary btn-sm rounded-pill" onclick="getLocation()">Cari lokasi</button>
                        </div>
                      </div>
                      <div class="col-12">
                        <label class="form-label">Transportasi</label> 
                          <select class="form-select" aria-label="Default select example" name="transportasi">
                            <option value="Sepeda Motor" {{($siswa->transportasi === 'Sepeda Motor') ? 'selected' : ''}}>Sepeda Motor</option>
                            <option value="Mobil Pribadi" {{($siswa->transportasi === 'Mobil Pribadi') ? 'selected' : ''}}>Mobil Pribadi</option>
                            <option value="Antar Jemput Sekolah" {{($siswa->transportasi === 'Antar Jemput Sekolah') ? 'selected' : ''}}>Antar Jemput Sekolah</option>
                            <option value="Angkutan Umum" {{($siswa->transportasi === 'Angkutan Umum') ? 'selected' : ''}}>Angkutan Umum</option>
                            <option value="Perahu/Sampan" {{($siswa->transportasi === 'Perahu/Sampan') ? 'selected' : ''}}>Perahu/Sampan</option>
                            <option value="Lainnya" {{($siswa->transportasi === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('transportasi'))
                                  <p class="text-danger">{{$errors->first('transportasi')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Jarak</label> 
                          <select class="form-select" aria-label="Default select example" name="jarak">
                            <option value="Kurang dari 5 km" {{($siswa->jarak === 'Kurang dari 5 km') ? 'selected' : ''}}>Kurang dari 5 km</option>
                            <option value="Antara 5-10 km" {{($siswa->jarak === 'Antara 5-10 km') ? 'selected' : ''}}>Antara 5-10 km</option>
                            <option value="Antara 11-20 km" {{($siswa->jarak === 'Antara 11-20 km') ? 'selected' : ''}}>Antara 11-20 km</option>
                            <option value="Antara 21-30 km" {{($siswa->jarak === 'Antara 21-30 km') ? 'selected' : ''}}>Antara 21-30 km</option>
                            <option value="lebih dari 30 km" {{($siswa->jarak === 'lebih dari 30 km') ? 'selected' : ''}}>lebih dari 30 km</option>   
                          </select>  
                          @if ($errors->has('jarak'))
                                  <p class="text-danger">{{$errors->first('jarak')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Waktu Tempuh</label> 
                          <select class="form-select" aria-label="Default select example" name="waktu_tempu">
                            <option value="1-10 menit" {{($siswa->waktu_tempu === '1-10 menit') ? 'selected' : ''}}>1-10 menit</option>
                            <option value="10-19 menit" {{($siswa->waktu_tempu === '10-19 menit') ? 'selected' : ''}}>10-19 menit</option>
                            <option value="20-29 menit" {{($siswa->waktu_tempu === '20-29 menit') ? 'selected' : ''}}>20-29 menit</option>
                            <option value="30-39 menit" {{($siswa->waktu_tempu === '30-39 menit') ? 'selected' : ''}}>30-39 menit</option>
                            <option value="1-2 jam" {{($siswa->waktu_tempu === '1-2 jam') ? 'selected' : ''}}>1-2 jam</option>   
                            <option value="> 2 jam" {{($siswa->waktu_tempu === '> 2 jam') ? 'selected' : ''}}>>2 jam</option>   
                          </select>  
                          @if ($errors->has('waktu_tempu'))
                                  <p class="text-danger">{{$errors->first('waktu_tempu')}}</p>
                          @endif
                      </div>
                
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- Vertical Form -->
                  </div>
                  <div class="tab-pane fade" id="bordered-justified-orangtua" role="tabpanel" aria-labelledby="orangtua-tab">
                    <form  class="row g-3" action="{{route('user.siswa.updateDataOrangTua',$siswa->id)}}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="col-12">
                        <label class="form-label">Status Ayah</label> 
                          <select class="form-select" aria-label="Default select example" name="stts_ayah">
                            <option value="Masih Hidup" {{($siswa->stts_ayah === 'Masih Hidup') ? 'selected' : ''}}>Masih Hidup</option>
                            <option value="Meninggal Dunia" {{($siswa->stts_ayah === 'Meninggal Dunia') ? 'selected' : ''}}>Meninggal Dunia</option>
                          </select>  
                          @if ($errors->has('stts_ayah'))
                                <p class="text-danger">{{$errors->first('stts_ayah')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="nik_ayah" class="form-label">NIK Ayah</label>
                        <input type="number" class="form-control {{$errors->has('nik_ayah') ? 'is-invalid' : ''}}" id="" name="nik_ayah" value="{{old('nik_ayah') ?: $siswa->nik_ayah}}">
                        @if ($errors->has('nik_ayah'))
                              <p class="text-danger">{{$errors->first('nik_ayah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control {{$errors->has('nama_ayah') ? 'is-invalid' : ''}}" id="" name="nama_ayah" value="{{old('nama_ayah') ?: $siswa->nama_ayah}}">
                        @if ($errors->has('nama_ayah'))
                                <p class="text-danger">{{$errors->first('nama_ayah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control {{$errors->has('tempat_lahir_ayah') ? 'is-invalid' : ''}}" id="" name="tempat_lahir_ayah" value="{{old('tempat_lahir_ayah') ?: $siswa->tempat_lahir_ayah}}">
                        @if ($errors->has('tempat_lahir_ayah'))
                            <p class="text-danger">{{$errors->first('tempat_lahir_ayah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tgl_lahir_ayah" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control {{$errors->has('tgl_lahir_ayah') ? 'is-invalid' : ''}}" id="" name="tgl_lahir_ayah" value="{{old('tgl_lahir_ayah') ?: $siswa->tgl_lahir_ayah}}">
                        @if ($errors->has('tgl_lahir_ayah'))
                                  <p class="text-danger">{{$errors->first('tgl_lahir_ayah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pendidikan</label> 
                          <select class="form-select" aria-label="Default select example" name="pendidikan_ayah">
                            <option value="SD/Sederajat" {{($siswa->pendidikan_ayah === 'SD/Sederajat') ? 'selected' : ''}}>SD/Sederajat</option>
                            <option value="SMP/Sederajat" {{($siswa->pendidikan_ayah === 'SMP/Sederajat') ? 'selected' : ''}}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat" {{($siswa->pendidikan_ayah === 'SMA/Sederajat') ? 'selected' : ''}}>SMA/Sederajat</option>
                            <option value="D1" {{($siswa->pendidikan_ayah === 'D1') ? 'selected' : ''}}>D1</option>
                            <option value="D2" {{($siswa->pendidikan_ayah === 'D2') ? 'selected' : ''}}>D2</option>
                            <option value="D3" {{($siswa->pendidikan_ayah === 'D3') ? 'selected' : ''}}>D3</option>
                            <option value="D4/S1" {{($siswa->pendidikan_ayah === 'D4/S1') ? 'selected' : ''}}>D4/S1</option>
                            <option value="S2" {{($siswa->pendidikan_ayah === 'S2') ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{($siswa->pendidikan_ayah === 'S3') ? 'selected' : ''}}>S3</option>
                            <option value="Tidak Bersekolah" {{($siswa->pendidikan_ayah === 'Tidak Bersekolah') ? 'selected' : ''}}>Tidak Bersekolah</option>
                          </select>  
                          @if ($errors->has('pendidikan_ayah'))
                                  <p class="text-danger">{{$errors->first('pendidikan_ayah')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pekerjaan</label> 
                          <select class="form-select" aria-label="Default select example" name="pekerjaan_ayah">
                            <option value="Tidak Bekerja" {{($siswa->pekerjaan_ayah === 'Tidak Bekerja') ? 'selected' : ''}}>Tidak Bekerja</option>
                            <option value="Pensiunan" {{($siswa->pekerjaan_ayah === 'Pensiunan') ? 'selected' : ''}}>Pensiunan</option>
                            <option value="PNS" {{($siswa->pekerjaan_ayah === 'PNS') ? 'selected' : ''}}>PNS</option>
                            <option value="TNI/Polisi" {{($siswa->pekerjaan_ayah === 'TNI/Polisi') ? 'selected' : ''}}>TNI/Polisi</option>
                            <option value="Guru/Dosen" {{($siswa->pekerjaan_ayah === 'Guru/Dosen') ? 'selected' : ''}}>Guru/Dosen</option>
                            <option value="Pegawai Swasta" {{($siswa->pekerjaan_ayah === 'Pegawai Swasta') ? 'selected' : ''}}>Pegawai Swasta</option>
                            <option value="Wiraswasta" {{($siswa->pekerjaan_ayah === 'Wiraswasta') ? 'selected' : ''}}>Wiraswasta</option>
                            <option value="Pengacara/Jaksa/Hakim/Notaris" {{($siswa->pekerjaan_ayah === 'Pengacara/Jaksa/Hakim/Notaris') ? 'selected' : ''}}>Pengacara/Jaksa/Hakim/Notaris</option>
                            <option value="Seniman/Pelukis/Artis/Sejeni" {{($siswa->pekerjaan_ayah === 'Seniman/Pelukis/Artis/Sejeni') ? 'selected' : ''}}>Seniman/Pelukis/Artis/Sejenis</option>
                            <option value="Dokter/Bidan/Perawat" {{($siswa->pekerjaan_ayah === 'Dokter/Bidan/Perawat') ? 'selected' : ''}}>Dokter/Bidan/Perawat</option>
                            <option value="Pilot/Pramugara" {{($siswa->pekerjaan_ayah === 'Pilot/Pramugara') ? 'selected' : ''}}>Pilot/Pramugara</option>
                            <option value="Pedagang" {{($siswa->pekerjaan_ayah === 'Pedagang') ? 'selected' : ''}}>Pedagang</option>
                            <option value="Petani/Peternak" {{($siswa->pekerjaan_ayah === 'Petani/Peternak') ? 'selected' : ''}}>Petani/Peternak</option>
                            <option value="Nelayan" {{($siswa->pekerjaan_ayah === 'Nelayan') ? 'selected' : ''}}>Nelayan</option>
                            <option value="Buruh (Tani/Pabrik/Bangunan)" {{($siswa->pekerjaan_ayah === 'Buruh (Tani/Pabrik/Bangunan)') ? 'selected' : ''}}>Buruh (Tani/Pabrik/Bangunan)</option>
                            <option value="Sopir/Masinis/Kondektur" {{($siswa->pekerjaan_ayah === 'Sopir/Masinis/Kondektur') ? 'selected' : ''}}>Sopir/Masinis/Kondektur</option>
                            <option value="Politikus" {{($siswa->pekerjaan_ayah === 'Politikus') ? 'selected' : ''}}>Politikus</option>
                            <option value="Lainnya" {{($siswa->pekerjaan_ayah === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('pekerjaan_ayah'))
                                  <p class="text-danger">{{$errors->first('pekerjaan_ayah')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Penghasilan</label> 
                          <select class="form-select" aria-label="Default select example" name="penghasilan_ayah">
                            <option value="Kurang dari 500.000" {{($siswa->penghasilan_ayah === 'Kurang dari 500.000') ? 'selected' : ''}}>Kurang dari 500.000</option>
                            <option value="500.000 - 1.000.000" {{($siswa->penghasilan_ayah === '500.000 - 1.000.000') ? 'selected' : ''}}>500.000 - 1.000.000</option>
                            <option value="1.000.000 - 2.000.000" {{($siswa->penghasilan_ayah === '1.000.000 - 2.000.000') ? 'selected' : ''}}>1.000.000 - 2.000.000</option>
                            <option value="2.000.000 - 3.000.000" {{($siswa->penghasilan_ayah === '2.000.000 - 3.000.000') ? 'selected' : ''}}>2.000.000 - 3.000.000</option>
                            <option value="3.000.000 - 5.000.000" {{($siswa->penghasilan_ayah === '3.000.000 - 5.000.000') ? 'selected' : ''}}>3.000.000 - 5.000.000</option>
                            <option value="lebih dari 5.000.000" {{($siswa->penghasilan_ayah === 'lebih dari 5.000.000') ? 'selected' : ''}}>lebih dari 5.000.000</option>
                            <option value="Tidak Ada" {{($siswa->penghasilan_ayah === 'Tidak Ada') ? 'selected' : ''}}>Tidak Ada</option>
                          </select>  
                          @if ($errors->has('penghasilan_ayah'))
                                  <p class="text-danger">{{$errors->first('penghasilan_ayah')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
                        <input type="text" class="form-control {{$errors->has('no_hp_ayah') ? 'is-invalid' : ''}}" id="" name="no_hp_ayah" value="{{old('no_hp_ayah') ?: $siswa->no_hp_ayah}}">
                        @if ($errors->has('no_hp_ayah'))
                            <p class="text-danger">{{$errors->first('no_hp_ayah')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Status Ibu</label> 
                          <select class="form-select" aria-label="Default select example" name="stts_ibu">
                            <option value="Masih Hidup" {{($siswa->stts_ibu === 'Masih Hidup') ? 'selected' : ''}}>Masih Hidup</option>
                            <option value="Meninggal Dunia" {{($siswa->stts_ibu === 'Meninggal Dunia') ? 'selected' : ''}}>Meninggal Dunia</option>
                          </select>  
                          @if ($errors->has('stts_ibu'))
                                  <p class="text-danger">{{$errors->first('stts_ibu')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="nik_ibu" class="form-label">NIK ibu</label>
                        <input type="number" class="form-control {{$errors->has('nik_ibu') ? 'is-invalid' : ''}}" id="" name="nik_ibu" value="{{old('nik_ibu') ?: $siswa->nik_ibu}}">
                        @if ($errors->has('nik_ibu'))
                              <p class="text-danger">{{$errors->first('nik_ibu')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control {{$errors->has('nama_ibu') ? 'is-invalid' : ''}}" id="" name="nama_ibu" value="{{old('nama_ibu') ?: $siswa->nama_ibu}}">
                        @if ($errors->has('nama_ibu'))
                                <p class="text-danger">{{$errors->first('nama_ibu')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control {{$errors->has('tempat_lahir_ibu') ? 'is-invalid' : ''}}" id="" name="tempat_lahir_ibu" value="{{old('tempat_lahir_ibu') ?: $siswa->tempat_lahir_ibu}}">
                        @if ($errors->has('tempat_lahir_ibu'))
                            <p class="text-danger">{{$errors->first('tempat_lahir_ibu')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="tgl_lahir_ibu" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control {{$errors->has('tgl_lahir_ibu') ? 'is-invalid' : ''}}" id="" name="tgl_lahir_ibu" value="{{old('tgl_lahir_ibu') ?: $siswa->tgl_lahir_ibu}}">
                        @if ($errors->has('tgl_lahir_ibu'))
                                  <p class="text-danger">{{$errors->first('tgl_lahir_ibu')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pendidikan</label> 
                          <select class="form-select" aria-label="Default select example" name="pendidikan_ibu">
                            <option value="SD/Sederajat" {{($siswa->pendidikan_ibu === 'SD/Sederajat') ? 'selected' : ''}}>SD/Sederajat</option>
                            <option value="SMP/Sederajat" {{($siswa->pendidikan_ibu === 'SMP/Sederajat') ? 'selected' : ''}}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat" {{($siswa->pendidikan_ibu === 'SMA/Sederajat') ? 'selected' : ''}}>SMA/Sederajat</option>
                            <option value="D1" {{($siswa->pendidikan_ibu === 'D1') ? 'selected' : ''}}>D1</option>
                            <option value="D2" {{($siswa->pendidikan_ibu === 'D2') ? 'selected' : ''}}>D2</option>
                            <option value="D3" {{($siswa->pendidikan_ibu === 'D3') ? 'selected' : ''}}>D3</option>
                            <option value="D4/S1" {{($siswa->pendidikan_ibu === 'D4/S1') ? 'selected' : ''}}>D4/S1</option>
                            <option value="S2" {{($siswa->pendidikan_ibu === 'S2') ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{($siswa->pendidikan_ibu === 'S3') ? 'selected' : ''}}>S3</option>
                            <option value="Tidak Bersekolah" {{($siswa->pendidikan_ibu === 'Tidak Bersekolah') ? 'selected' : ''}}>Tidak Bersekolah</option>
                          </select>  
                          @if ($errors->has('pendidikan_ibu'))
                                  <p class="text-danger">{{$errors->first('pendidikan_ibu')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pekerjaan</label> 
                          <select class="form-select" aria-label="Default select example" name="pekerjaan_ibu">
                            <option value="Tidak Bekerja" {{($siswa->pekerjaan_ibu === 'Tidak Bekerja') ? 'selected' : ''}}>Tidak Bekerja</option>
                            <option value="Pensiunan" {{($siswa->pekerjaan_ibu === 'Pensiunan') ? 'selected' : ''}}>Pensiunan</option>
                            <option value="PNS" {{($siswa->pekerjaan_ibu === 'PNS') ? 'selected' : ''}}>PNS</option>
                            <option value="TNI/Polisi" {{($siswa->pekerjaan_ibu === 'TNI/Polisi') ? 'selected' : ''}}>TNI/Polisi</option>
                            <option value="Guru/Dosen" {{($siswa->pekerjaan_ibu === 'Guru/Dosen') ? 'selected' : ''}}>Guru/Dosen</option>
                            <option value="Pegawai Swasta" {{($siswa->pekerjaan_ibu === 'Pegawai Swasta') ? 'selected' : ''}}>Pegawai Swasta</option>
                            <option value="Wiraswasta" {{($siswa->pekerjaan_ibu === 'Wiraswasta') ? 'selected' : ''}}>Wiraswasta</option>
                            <option value="Pengacara/Jaksa/Hakim/Notaris" {{($siswa->pekerjaan_ibu === 'Pengacara/Jaksa/Hakim/Notaris') ? 'selected' : ''}}>Pengacara/Jaksa/Hakim/Notaris</option>
                            <option value="Seniman/Pelukis/Artis/Sejeni" {{($siswa->pekerjaan_ibu === 'Seniman/Pelukis/Artis/Sejeni') ? 'selected' : ''}}>Seniman/Pelukis/Artis/Sejenis</option>
                            <option value="Dokter/Bidan/Perawat" {{($siswa->pekerjaan_ibu === 'Dokter/Bidan/Perawat') ? 'selected' : ''}}>Dokter/Bidan/Perawat</option>
                            <option value="Pilot/Pramugara" {{($siswa->pekerjaan_ibu === 'Pilot/Pramugara') ? 'selected' : ''}}>Pilot/Pramugara</option>
                            <option value="Pedagang" {{($siswa->pekerjaan_ibu === 'Pedagang') ? 'selected' : ''}}>Pedagang</option>
                            <option value="Petani/Peternak" {{($siswa->pekerjaan_ibu === 'Petani/Peternak') ? 'selected' : ''}}>Petani/Peternak</option>
                            <option value="Nelayan" {{($siswa->pekerjaan_ibu === 'Nelayan') ? 'selected' : ''}}>Nelayan</option>
                            <option value="Buruh (Tani/Pabrik/Bangunan)" {{($siswa->pekerjaan_ibu === 'Buruh (Tani/Pabrik/Bangunan)') ? 'selected' : ''}}>Buruh (Tani/Pabrik/Bangunan)</option>
                            <option value="Sopir/Masinis/Kondektur" {{($siswa->pekerjaan_ibu === 'Sopir/Masinis/Kondektur') ? 'selected' : ''}}>Sopir/Masinis/Kondektur</option>
                            <option value="Politikus" {{($siswa->pekerjaan_ibu === 'Politikus') ? 'selected' : ''}}>Politikus</option>
                            <option value="Lainnya" {{($siswa->pekerjaan_ibu === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('pekerjaan_ibu'))
                                  <p class="text-danger">{{$errors->first('pekerjaan_ibu')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Penghasilan</label> 
                          <select class="form-select" aria-label="Default select example" name="penghasilan_ibu">
                            <option value="Kurang dari 500.000" {{($siswa->penghasilan_ibu === 'Kurang dari 500.000') ? 'selected' : ''}}>Kurang dari 500.000</option>
                            <option value="500.000 - 1.000.000" {{($siswa->penghasilan_ibu === '500.000 - 1.000.000') ? 'selected' : ''}}>500.000 - 1.000.000</option>
                            <option value="1.000.000 - 2.000.000" {{($siswa->penghasilan_ibu === '1.000.000 - 2.000.000') ? 'selected' : ''}}>1.000.000 - 2.000.000</option>
                            <option value="2.000.000 - 3.000.000" {{($siswa->penghasilan_ibu === '2.000.000 - 3.000.000') ? 'selected' : ''}}>2.000.000 - 3.000.000</option>
                            <option value="3.000.000 - 5.000.000" {{($siswa->penghasilan_ibu === '3.000.000 - 5.000.000') ? 'selected' : ''}}>3.000.000 - 5.000.000</option>
                            <option value="lebih dari 5.000.000" {{($siswa->penghasilan_ibu === 'lebih dari 5.000.000') ? 'selected' : ''}}>lebih dari 5.000.000</option>
                            <option value="Tidak Ada" {{($siswa->penghasilan_ibu === 'Tidak Ada') ? 'selected' : ''}}>Tidak Ada</option>
                          </select>  
                          @if ($errors->has('penghasilan_ibu'))
                                  <p class="text-danger">{{$errors->first('penghasilan_ibu')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="no_hp_ibu" class="form-label">No HP ibu</label>
                        <input type="text" class="form-control {{$errors->has('no_hp_ibu') ? 'is-invalid' : ''}}" id="" name="no_hp_ibu" value="{{old('no_hp_ibu') ?: $siswa->no_hp_ibu}}">
                        @if ($errors->has('no_hp_ibu'))
                            <p class="text-danger">{{$errors->first('no_hp_ibu')}}</p>
                        @endif
                      </div>
                      <div class="mt-4">
                        <h5 class="mt-3">Data Lengkap Wali</h3>
                      </div>
                      <div class="col-12">
                        <label for="nik_wali" class="form-label">NIK Wali</label>
                        <input type="number" class="form-control {{$errors->has('nik_wali') ? 'is-invalid' : ''}}" id="" name="nik_wali" value="{{old('nik_wali') ?: $siswa->nik_wali}}" >
                        @if ($errors->has('nik_wali'))
                              <p class="text-danger">{{$errors->first('nik_wali')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label for="nama_wali" class="form-label">Nama wali</label>
                        <input type="text" class="form-control {{$errors->has('nama_wali') ? 'is-invalid' : ''}}" id="" name="nama_wali" value="{{old('nama_wali') ?: $siswa->nama_wali}}" >
                        @if ($errors->has('nama_wali'))
                                <p class="text-danger">{{$errors->first('nama_wali')}}</p>
                        @endif
                      </div>
        
                      <div class="col-12">
                        <label for="tgl_lahir_wali" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control {{$errors->has('tgl_lahir_wali') ? 'is-invalid' : ''}}" id="" name="tgl_lahir_wali" value="{{old('tgl_lahir_wali') ?: $siswa->tgl_lahir_wali}}">
                        @if ($errors->has('tgl_lahir_wali'))
                                  <p class="text-danger">{{$errors->first('tgl_lahir_wali')}}</p>
                        @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pendidikan</label> 
                          <select class="form-select" aria-label="Default select example" name="pendidikan_wali">
                            <option value=""></option>
                            <option value="SD/Sederajat" {{($siswa->pendidikan_wali === 'SD/Sederajat') ? 'selected' : ''}}>SD/Sederajat</option>
                            <option value="SMP/Sederajat" {{($siswa->pendidikan_wali === 'SMP/Sederajat') ? 'selected' : ''}}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat" {{($siswa->pendidikan_wali === 'SMA/Sederajat') ? 'selected' : ''}}>SMA/Sederajat</option>
                            <option value="D1" {{($siswa->pendidikan_wali === 'D1') ? 'selected' : ''}}>D1</option>
                            <option value="D2" {{($siswa->pendidikan_wali === 'D2') ? 'selected' : ''}}>D2</option>
                            <option value="D3" {{($siswa->pendidikan_wali === 'D3') ? 'selected' : ''}}>D3</option>
                            <option value="D4/S1" {{($siswa->pendidikan_wali === 'D4/S1') ? 'selected' : ''}}>D4/S1</option>
                            <option value="S2" {{($siswa->pendidikan_wali === 'S2') ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{($siswa->pendidikan_wali === 'S3') ? 'selected' : ''}}>S3</option>
                            <option value="Tidak Bersekolah" {{($siswa->pendidikan_wali === 'Tidak Bersekolah') ? 'selected' : ''}}>Tidak Bersekolah</option>
                          </select>  
                          @if ($errors->has('pendidikan_wali'))
                                  <p class="text-danger">{{$errors->first('pendidikan_wali')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Pekerjaan</label> 
                          <select class="form-select" aria-label="Default select example" name="pekerjaan_wali">
                            <option value=""></option>
                            <option value="Tidak Bekerja" {{($siswa->pekerjaan_wali === 'Tidak Bekerja') ? 'selected' : ''}}>Tidak Bekerja</option>
                            <option value="Pensiunan" {{($siswa->pekerjaan_wali === 'Pensiunan') ? 'selected' : ''}}>Pensiunan</option>
                            <option value="PNS" {{($siswa->pekerjaan_wali === 'PNS') ? 'selected' : ''}}>PNS</option>
                            <option value="TNI/Polisi" {{($siswa->pekerjaan_wali === 'TNI/Polisi') ? 'selected' : ''}}>TNI/Polisi</option>
                            <option value="Guru/Dosen" {{($siswa->pekerjaan_wali === 'Guru/Dosen') ? 'selected' : ''}}>Guru/Dosen</option>
                            <option value="Pegawai Swasta" {{($siswa->pekerjaan_wali === 'Pegawai Swasta') ? 'selected' : ''}}>Pegawai Swasta</option>
                            <option value="Wiraswasta" {{($siswa->pekerjaan_wali === 'Wiraswasta') ? 'selected' : ''}}>Wiraswasta</option>
                            <option value="Pengacara/Jaksa/Hakim/Notaris" {{($siswa->pekerjaan_wali === 'Pengacara/Jaksa/Hakim/Notaris') ? 'selected' : ''}}>Pengacara/Jaksa/Hakim/Notaris</option>
                            <option value="Seniman/Pelukis/Artis/Sejeni" {{($siswa->pekerjaan_wali === 'Seniman/Pelukis/Artis/Sejeni') ? 'selected' : ''}}>Seniman/Pelukis/Artis/Sejenis</option>
                            <option value="Dokter/Bidan/Perawat" {{($siswa->pekerjaan_wali === 'Dokter/Bidan/Perawat') ? 'selected' : ''}}>Dokter/Bidan/Perawat</option>
                            <option value="Pilot/Pramugara" {{($siswa->pekerjaan_wali === 'Pilot/Pramugara') ? 'selected' : ''}}>Pilot/Pramugara</option>
                            <option value="Pedagang" {{($siswa->pekerjaan_wali === 'Pedagang') ? 'selected' : ''}}>Pedagang</option>
                            <option value="Petani/Peternak" {{($siswa->pekerjaan_wali === 'Petani/Peternak') ? 'selected' : ''}}>Petani/Peternak</option>
                            <option value="Nelayan" {{($siswa->pekerjaan_wali === 'Nelayan') ? 'selected' : ''}}>Nelayan</option>
                            <option value="Buruh (Tani/Pabrik/Bangunan)" {{($siswa->pekerjaan_wali === 'Buruh (Tani/Pabrik/Bangunan)') ? 'selected' : ''}}>Buruh (Tani/Pabrik/Bangunan)</option>
                            <option value="Sopir/Masinis/Kondektur" {{($siswa->pekerjaan_wali === 'Sopir/Masinis/Kondektur') ? 'selected' : ''}}>Sopir/Masinis/Kondektur</option>
                            <option value="Politikus" {{($siswa->pekerjaan_wali === 'Politikus') ? 'selected' : ''}}>Politikus</option>
                            <option value="Lainnya" {{($siswa->pekerjaan_wali === 'Lainnya') ? 'selected' : ''}}>Lainnya</option>
                          </select>  
                          @if ($errors->has('pekerjaan_wali'))
                                  <p class="text-danger">{{$errors->first('pekerjaan_wali')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label class="form-label">Penghasilan</label> 
                          <select class="form-select" aria-label="Default select example" name="penghasilan_wali">
                            <option value=""></option>
                            <option value="Kurang dari 500.000" {{($siswa->penghasilan_wali === 'Kurang dari 500.000') ? 'selected' : ''}}>Kurang dari 500.000</option>
                            <option value="500.000 - 1.000.000" {{($siswa->penghasilan_wali === '500.000 - 1.000.000') ? 'selected' : ''}}>500.000 - 1.000.000</option>
                            <option value="1.000.000 - 2.000.000" {{($siswa->penghasilan_wali === '1.000.000 - 2.000.000') ? 'selected' : ''}}>1.000.000 - 2.000.000</option>
                            <option value="2.000.000 - 3.000.000" {{($siswa->penghasilan_wali === '2.000.000 - 3.000.000') ? 'selected' : ''}}>2.000.000 - 3.000.000</option>
                            <option value="3.000.000 - 5.000.000" {{($siswa->penghasilan_wali === '3.000.000 - 5.000.000') ? 'selected' : ''}}>3.000.000 - 5.000.000</option>
                            <option value="lebih dari 5.000.000" {{($siswa->penghasilan_wali === 'lebih dari 5.000.000') ? 'selected' : ''}}>lebih dari 5.000.000</option>
                            <option value="Tidak Ada" {{($siswa->penghasilan_wali === 'Tidak Ada') ? 'selected' : ''}}>Tidak Ada</option>
                          </select>  
                          @if ($errors->has('penghasilan_wali'))
                                  <p class="text-danger">{{$errors->first('penghasilan_wali')}}</p>
                          @endif
                      </div>
                      <div class="col-12">
                        <label for="no_hp_wali" class="form-label">No HP Wali</label>
                        <input type="text" class="form-control {{$errors->has('no_hp_wali') ? 'is-invalid' : ''}}" id="" name="no_hp_wali" value="{{old('no_hp_wali') ?: $siswa->no_hp_wali}}">
                        @if ($errors->has('no_hp_Wali'))
                            <p class="text-danger">{{$errors->first('no_hp_wali')}}</p>
                        @endif
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form><!-- Vertical Form -->
                  </div>
                  <div class="tab-pane fade" id="bordered-justified-upload-foto" role="tabpanel" aria-labelledby="uploadfoto-tab">
                    {{-- css content center --}}
                    <div class="d-flex justify-content-center">
                      @if ($siswa->foto)
                        <img src="{{asset('storage/'.$siswa->foto)}}" alt="foto" class="img-circle" style="border-radius: 200px" width="200px" height="200px">
                      @else
                        <img src="https://ui-avatars.com/api/?name=hendra" alt="" class="img-fluid" style="border-radius: 200px" width="200px" height="200px">
                      @endif
                    </div>
                    <form class="row g-3" action="{{route('user.siswa.uploadFoto',$siswa->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
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
                <p class="mb-0">Selamat anda telah dinyatakan lulus</p> 
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
                    <a class="btn btn-success btn-sm rounded-pill" href="{{route('user.download-pdf')}}"><i class="bi bi-eye-fill"></i> Lihat formulir</a>
                  </div>
                  <div class="col-sm-4 text-center">
                    <button class="btn btn-lg btn-primary rounded-pill" style="width: 3rem; height:3rem;">3</button>
                    <h5 class="mt-2">Berkas Lainnya</h5>
                    <a class="btn btn-secondary btn-sm rounded-pill" href="{{route('user.show-pdf')}}"><i class="bi bi-download"></i> Download Berkas</a>
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