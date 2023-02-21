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
          <li class="breadcrumb-item">Upload Berkas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Berkas</h5>
                  <form class="row g-3" action="{{route('user.document.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                      <label for="inputNumber" class="col-sm-2 col-form-label bold"><strong> Kartu Keluarga (KK)</strong></label>
                      <p class="text-secondary h6">Unggah Kartu Keluarga kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                      <div class="col-sm-12">
                        <input class="form-control" type="file" name="kartu_keluarga" id="formFile">
                        @if ($errors->has('kartu_keluarga'))
                          <p class="text-danger">{{$errors->first('kartu_keluarga')}}</p>
                       @endif
                      </div>
                    </div>   
                    <div class="col-12">
                      <label for="inputNumber" class="col-sm-2 col-form-label"><strong>KTP</strong></label>
                      <p class="text-secondary h6">Unggah KTP kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                      <div class="col-sm-12">
                        <input class="form-control" type="file" name="ijazah" id="formFile">
                        @if ($errors->has('ijazah'))
                          <p class="text-danger">{{$errors->first('ijazah')}}</p>
                       @endif
                      </div>
                    </div>   
                    <div class="col-12">
                      <label for="inputNumber" class="col-sm-2 col-form-label"><strong>SKU DAN NIB</strong></label>
                      <p class="text-secondary h6">Unggah Surat Keterangan Usaha (SKU) atau Nomor Induk Berusaha (NIB) kamu dalam format <strong>PDF</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                      <div class="col-sm-12">
                        <input class="form-control" type="file" name="rapor" id="formFile">
                        @if ($errors->has('rapor'))
                          <p class="text-danger">{{$errors->first('rapor')}}</p>
                       @endif
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="inputNumber" class="col-sm-2 col-form-label"><strong>Foto Tempat Usaha</strong></label>
                      <p class="text-secondary h6">Unggah Foto Tempat Usaha kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                      <div class="col-sm-12">
                        <input class="form-control" type="file" name="akta_kelahiran" id="formFile">
                        @if ($errors->has('akta_kelahiran'))
                          <p class="text-danger">{{$errors->first('akta_kelahiran')}}</p>
                       @endif
                      </div>
                    </div>      
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                  </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection