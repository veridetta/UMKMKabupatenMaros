@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    <main id="main" class="main">

    <div class="pagetitle">
     @include('components.alert')
     
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Jalur</h5>
                  <form class="row g-3" action="{{route('user.siswa.update',$siswa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                       <div class="col-12">
                            <label class="form-label">Pilih Jalur</label> 
                              <select class="form-select" aria-label="Default select example" name="jalur" required>         
                                <option value="Jalur Prestasi" {{($siswa->jalur === 'Jalur Prestasi') ? 'selected' : ''}}>Jalur Prestasi</option>                               
                                <option value="Jalur Zonasi" {{($siswa->jalur === 'Jalur Zonasi') ? 'selected' : ''}}>Jalur Zonasi</option>                               
                                <option value="Jalur Tes" {{($siswa->jalur === 'Jalur Tes') ? 'selected' : ''}}>Jalur Tes</option>                               
                                <option value="Jalur Reguler" {{($siswa->jalur === 'Jalur Reguler') ? 'selected' : ''}}>Jalur Reguler</option>                               
                              </select>  
                              @if ($errors->has('jalur'))
                                  <p class="text-danger">{{$errors->first('jalur')}}</p>
                              @endif
                          </div>  
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Selanjutnya</button>
                    </div>
                 </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection