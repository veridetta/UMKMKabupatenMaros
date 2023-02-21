 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->role == '1')
            <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'user.umkm') === 0 ? '' : 'collapsed')}}" href="{{route('user.umkm.index')}}">
                <i class="bi bi-journal-text"></i>
                <span>Formulir</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'user.document') === 0 ? '' : 'collapsed')}}" href="{{route('user.document.index')}}">
                <i class="bi bi-upload"></i>
                <span>Upload Berkas</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'user.cetak-formulir') === 0 ? '' : 'collapsed')}}" href="{{route('user.cetak-formulir')}}">
                <i class="bi bi-printer"></i>
                <span>Cetak Formulir</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'user.cetak-formulir') === 0 ? '' : 'collapsed')}}" href="{{route('user.data-umkm')}}">
                <i class="bi bi-people"></i>
                <span>Data UMKM</span>
                </a>
            </li><!-- End Dashboard Nav -->
           

        @endif
       
        @if (Auth::user()->role == '2')
             <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'admin.siswa') === 0 ? '' : 'collapsed')}}" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Data UMKM</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-nav" class="nav-content collapse {{(strpos(Route::currentRouteName(), 'admin.umkm') === 0 ? 'show' : '')}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(strpos(Route::currentRouteName(), 'admin.umkm.data-umkm') === 0 ? 'active' : '')}}" href="{{route('admin.umkm.data-umkm')}}">
                    <i class="bi bi-circle"></i><span>Data UMKM</span>
                    </a>
                </li>
                <li>
                    <a class="{{(strpos(Route::currentRouteName(), 'admin.umkm.index-document') === 0 ? 'active' : '')}}" href="{{route('admin.umkm.index-document')}}">
                    <i class="bi bi-circle"></i><span>Berkas UMKM</span>
                    </a>
                </li>
           
                </ul>
            </li><!-- End Forms Nav -->       
        @endif
        @if (Auth::user()->role == '3')
             <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'admin-kab.siswa') === 0 ? '' : 'collapsed')}}" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Data Siswa PPDB</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-nav" class="nav-content collapse {{(strpos(Route::currentRouteName(), 'admin-kab.siswa') === 0 ? 'show' : '')}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(strpos(Route::currentRouteName(), 'admin-kab.siswa.data-siswa') === 0 ? 'active' : '')}}" href="{{route('admin-kab.siswa.data-siswa')}}">
                    <i class="bi bi-circle"></i><span>Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a class="{{(strpos(Route::currentRouteName(), 'admin-kab.siswa.index-document') === 0 ? 'active' : '')}}" href="{{route('admin-kab.siswa.index-document')}}">
                    <i class="bi bi-circle"></i><span>Berkas Siswa</span>
                    </a>
                </li>
           
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(strpos(Route::currentRouteName(), 'admin-kab.sekolah.data-sekolah') === 0 ? '' : 'collapsed')}}" href="{{route('admin-kab.sekolah.data-sekolah')}}">
                <i class="bi bi-building"></i>
                <span>Sekolah</span>
                </a>
            </li>
            <!-- End Forms Nav -->       
        @endif

    </ul>

  </aside><!-- End Sidebar-->