@extends('layouts.app')
@section('content')
 @include('components.navbar',['tes'=>'tes'])
 @include('components.sidebar')
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ubah Password</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Ubah Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    @include('components.alert')
 
    <div class="card">
        <div class="card-body">
              <h5 class="card-title">Ubah Password</h5>

              <!-- Vertical Form -->
              <form class="row g-3" method="POST" action="{{route('update-password')}}">
                @csrf
                <div class="col-12">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control" name="current_password">
                   @if ($errors->has('current_password'))
                            <p class="text-danger">{{$errors->first('current_password')}}</p>
                     @endif
                </div>
                <div class="col-12">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control" name="password">
                   @if ($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="col-12">
                  <label class="form-label">Password Confirm</label>
                  <input type="password" class="form-control" name="password_confirmation">
                   @if ($errors->has('password_confirmation'))
                        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                    @endif
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save  <i class="bi bi-save-fill"></i></button>
                </div>
              </form><!-- Vertical Form -->

         </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
@endsection