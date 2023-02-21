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
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item">Upload Berkas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      @if ($user->status == 2)
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
      @else
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Upload Berkas</h5>
                        <form class="row g-3" action="{{route('user.document.update',$data->id)}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="col-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Kartu Keluarga</label>
                            <div class="col-sm-12">
                              <input class="form-control" type="file" name="kartu_keluarga" id="formFile">
                              @if ($errors->has('kartu_keluarga'))
                                <p class="text-danger">{{$errors->first('kartu_keluarga')}}</p>
                            @endif
                            </div>
                            <p class="mt-2">Preview</p>
                            <div class="col-sm-12">
                              <img src="{{asset('storage/'.$data->kartu_keluarga)}}" alt="" width="30%">
                            </div>
                          </div>   
                          <div class="col-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Akta Kelahiran</label>
                            <div class="col-sm-12">
                              <input class="form-control" type="file" name="akta_kelahiran" id="formFile">
                              @if ($errors->has('akta_kelahiran'))
                                <p class="text-danger">{{$errors->first('akta_kelahiran')}}</p>
                            @endif
                            </div>
                            <p class="mt-2">Preview</p>
                            <div class="col-sm-12">
                              <img src="{{asset('storage/'.$data->akta_kelahiran)}}" alt="" width="30%">
                            </div>
                          </div>   
                          <div class="col-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Akta Kelahiran</label>
                            <div class="col-sm-12">
                              <input class="form-control" type="file" name="ijazah" id="formFile">
                              @if ($errors->has('ijazah'))
                                <p class="text-danger">{{$errors->first('ijazah')}}</p>
                            @endif
                            </div>
                            <p class="mt-2">Preview</p>
                            <div class="col-sm-12">
                              <img src="{{asset('storage/'.$data->ijazah)}}" alt="" width="30%">
                            </div>
                          </div>   
                          <div class="col-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Nilai Rapor</label>
                            <div class="col-sm-12">
                              <input class="form-control" type="file" name="rapor" id="formFile">
                              @if ($errors->has('rapor'))
                                <p class="text-danger">{{$errors->first('rapor')}}</p>
                            @endif
                            </div>
                            
                          </div>   
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Upload Berkas</button>
                          </div>
                      </form>
                  </div>
                </div>

              </div>
            </div>
      @endif
    </section>

  </main><!-- End #main -->
@endsection