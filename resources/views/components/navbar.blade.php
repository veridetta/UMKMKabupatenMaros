<!-- ======= Header ======= -->
@php
    use App\Models\Umkm;
    
    if(Auth::user()->role == 2 ){
        
    }else{
      $data = Umkm::where('users_id', auth()->user()->id)->first();; 
    }
@endphp
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('user.dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('/img/LOGO MAROS.png')}}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (Auth::user()->role == 2)
              <img src="{{asset('img/avatar.png')}}" class="rounded-circle" alt="">
              <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->username}}</span>
            @elseif (Auth::user()->role == 1)
              @if ($data?->foto)
             <img src="{{ asset('storage/'.$data->foto) }}" style=" width: 50px;height: 50px;border-radius: 50%;" alt="Profile" alt="">
              @else
                <img src="{{asset('img/avatar.png')}}" class="rounded-circle" alt="">
              @endif
              <span class="d-none d-md-block dropdown-toggle ps-2">{{$data?->nama_pemilik ? $data->nama_pemilik : 'Anonymouse'}}</span>   
            @elseif (Auth::user()->role == 3)   
              <img src="{{asset('img/avatar.png')}}" class="rounded-circle" alt="">
              <span class="d-none d-md-block dropdown-toggle ps-2">Admin Kabupaten</span>   
            @endif
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('ubah-password')}}">
                <i class="bi bi-gear"></i>
                <span>Change Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span></a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->