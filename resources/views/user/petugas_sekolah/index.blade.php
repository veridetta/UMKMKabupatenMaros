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
            <li class="breadcrumb-item"><a href="index.html">Kelembagaan</a></li>
            <li class="breadcrumb-item">Profil Lembaga</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->
        <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Profil Lembaga</h5>
                <!-- Vertical Form -->
                <ul class="nav nav-tabs nav-tabs-bordered d-flex mb-4  " id="borderedTabJustified" role="tablist">
                    <li class="nav-item flex-fill" role="profile">
                    <button class="nav-link w-100 active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item flex-fill" role="alamat_lembaga">
                    <button class="nav-link w-100" id="alamat-lembaga-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-alamat-lembaga" type="button" role="tab" aria-controls="alamat-lembaga" aria-selected="true">Alamat Lembaga</button>
                    </li>
                    <li class="nav-item flex-fill" role="contact">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="data-kepalasekolah-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-data-kepalasekolah" type="button" role="tab" aria-controls="data-kepalasekolah" aria-selected="false">Data Kepala</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                    <div class="tab-pane fade show active" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form class="row g-3" action="{{route('admin.sekolah.update',$sekolah?->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="nsm" class="form-label">NSM</label>
                                <input type="text" name="nsm" class="form-control {{$errors->has('nsm') ? 'is-invalid' : ''}}" id="" value="{{old('nsm') ?: $sekolah?->nsm}}">
                                @if ($errors->has('nsm'))
                                        <p class="text-danger">{{$errors->first('nsm')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" name="npsn" class="form-control {{$errors->has('npsn') ? 'is-invalid' : ''}}" id="" value="{{old('npsn') ?: $sekolah?->npsn}}">
                                @if ($errors->has('npsn'))
                                        <p class="text-danger">{{$errors->first('npsn')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control {{$errors->has('nama_sekolah') ? 'is-invalid' : ''}}" id="" value="{{old('nama_sekolah') ?: $sekolah?->nama_sekolah}}">
                                @if ($errors->has('nama_sekolah'))
                                        <p class="text-danger">{{$errors->first('nama_sekolah')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="jenjang_sekolah" class="form-label">Jenjang Sekolah</label>
                                <input type="text" name="jenjang_sekolah" class="form-control {{$errors->has('jenjang_sekolah') ? 'is-invalid' : ''}}" id="" value="{{old('jenjang_sekolah') ?: $sekolah?->jenjang_sekolah}}">
                                @if ($errors->has('jenjang_sekolah'))
                                        <p class="text-danger">{{$errors->first('jenjang_sekolah')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="status_sekolah" class="form-label">Status Sekolah</label>
                                 <select class="form-select" aria-label="Default select example" name="status_sekolah" required>
                                    <option value="Negeri" {{($sekolah?->status_sekolah === 'Negeri') ? 'selected' : ''}}>Negeri</option>
                                    <option value="Swasta" {{($sekolah?->status_sekolah === 'Swasta') ? 'selected' : ''}}>Swasta</option>
                                
                                </select>  
                                @if ($errors->has('status_sekolah'))
                                        <p class="text-danger">{{$errors->first('status_sekolah')}}</p>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="bordered-justified-alamat-lembaga" role="tabpanel" aria-labelledby="alamat-lembaga-tab">
                        <form class="row g-3" action="{{route('admin.sekolah.alamatLembaga',$sekolah?->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <input type="text" name="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="" value="{{old('alamat') ?: $sekolah?->alamat}}">
                                @if ($errors->has('alamat'))
                                        <p class="text-danger">{{$errors->first('alamat')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="" value="{{old('provinsi') ?: $sekolah?->provinsi}}">
                                @if ($errors->has('provinsi'))
                                        <p class="text-danger">{{$errors->first('provinsi')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control {{$errors->has('kabupaten') ? 'is-invalid' : ''}}" id="" value="{{old('kabupaten') ?: $sekolah?->kabupaten}}">
                                @if ($errors->has('kabupaten'))
                                        <p class="text-danger">{{$errors->first('kabupaten')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="" value="{{old('kecamatan') ?: $sekolah?->kecamatan}}">
                                @if ($errors->has('kecamatan'))
                                        <p class="text-danger">{{$errors->first('kecamatan')}}</p>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form class="row g-3" action="{{route('admin.sekolah.alamatLembaga',$sekolah?->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="no_telpon" class="form-label">No Telpon</label>
                                <input type="text" name="no_telpon" class="form-control {{$errors->has('no_telpon') ? 'is-invalid' : ''}}" id="" value="{{old('no_telpon') ?: $sekolah?->no_telpon}}" required>
                                @if ($errors->has('no_telpon'))
                                        <p class="text-danger">{{$errors->first('no_telpon')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="" value="{{old('email') ?: $sekolah?->email}}" required>
                                @if ($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" class="form-control {{$errors->has('website') ? 'is-invalid' : ''}}" id="" value="{{old('website') ?: $sekolah?->website}}">
                                @if ($errors->has('website'))
                                        <p class="text-danger">{{$errors->first('website')}}</p>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="bordered-justified-data-kepalasekolah" role="tabpanel" aria-labelledby="data-kepalasekolah-tab">
                        <form class="row g-3" action="{{route('admin.sekolah.alamatLembaga',$sekolah?->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="kepala_sekolah" class="form-label">Kepala Madrasah/Sekolah</label>
                                <input type="text" name="kepala_sekolah" class="form-control {{$errors->has('kepala_sekolah') ? 'is-invalid' : ''}}" id="" value="{{old('kepala_sekolah') ?: $sekolah?->kepala_sekolah}}" required>
                                @if ($errors->has('kepala_sekolah'))
                                        <p class="text-danger">{{$errors->first('kepala_sekolah')}}</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="nip" class="form-label">Nip</label>
                                <input type="text" name="nip" class="form-control {{$errors->has('nip') ? 'is-invalid' : ''}}" id="" value="{{old('nip') ?: $sekolah?->nip}}" required>
                                @if ($errors->has('nip'))
                                        <p class="text-danger">{{$errors->first('nip')}}</p>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div><!-- End Bordered Tabs Justified -->
                </div>
            </div>
            </div>
        </div>
        </section>

    </main><!-- End #main -->
@endsection