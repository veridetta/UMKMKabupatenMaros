@extends('layouts.app')
@section('content')
 @include('components.navbar')
 @include('components.sidebar')
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    

    <section class="section dashboard">
      @if($umkm!==NULL)
        @if ($umkm->status == 1)
          <div class="alert alert-info  alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
              <p class="mb-0">Silahkan menunggu konfirmasi dari petugas</p> 
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
                  <a class="btn btn-secondary btn-sm rounded-pill" href="#"><i class="bi bi-download"></i> Download Berkas</a>
                </div>
              </div>
          </div>
        @elseif ($umkm->status == 2)
          <div class="alert alert-info  alert-dismissible fade show" role="alert">
              <h4 class="alert-heading">Terima Kasih Sudah melakukan pendaftaran</h4>
              <p class="mb-0">Selamat anda berhasil melakukan pendaftaran</p> 
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
                  <a class="btn btn-secondary btn-sm rounded-pill" href="#"><i class="bi bi-download"></i> Download Berkas</a>
                </div>
              </div>
          </div>
        @endif
      @endif
      <!-- Recent Activity -->
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pengumuman <span>| Today</span></h5>

              <div class="activity">

              <div class="activity-item d-flex">
                  <div class="activite-label">2023-06-02 08:50:21</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <h5>Persyaratan Daftar mendapatkan bantuan BLT UMKM</h5>
                    <p>berkas persyaratan pendaftaran mendapatkan bantuan BLT UMKM, berupa :</p>
                    <ol>
                      <li>Pemilik usaha berstatus sebagai Warga Negara Indonesia (WNI);</li>
                      <li>Memiliki Nomor Induk Kependudukan (NIK);</li>
                      <li>Pelaku usaha harus mempunyai usaha dengan skala kecil, mkro ataupun menengah serta memiliki NIK;</li>
                      <li>Memiliki usah mikro yang dibuktikan dengan surat usulan calon penerima Bantuan Produktif Usaha Mikro (BPUM) dari pengusul BPUM beserta lampirannya yang merupakan satu kesatuan</li>
                      <li>Pelaku UMKM tidak tercatat sebagai anggota TNI, Polri, Aparatur Sipil Negara (ASN), karyawan Badan Usaha Milik Daerah/ Negara (BUMD/ BUMN).</li>
                      <li>Pelaku UMKM bukanlah pensiunan TNI, Polri, ASN maupun BUMD/ BUMN.</li>
                      <li>Usaha mikro, kecil dan menengah (UMKM) tersebut tidak sedang menerima bantuan kredit dari bank maupun KUR.</li>
                      <li>Pelaku UMKM yang alamat usahanya tidak sama dengan alamat KTP wajib menyertakan Surat Keterangan Usaha (SKU) yang diterbitkan oleh pihak terkait yaitu Dinas Koperasi setempat</li>

                    </ol>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2023-06-02 08:50:21</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <h5>Penerima BLT UMKM </h5>
                    <p>Untuk calon penerima BLT UMKM bisa melengkapi data usulan kepada pengusul sebagai berikut :</p>
                    <ol>
                      <li>Nomor Induk Kependudukan (NIK);</li>
                      <li>Nomor Kartu Keluarga (KK);</li>
                      <li>Nama dan identitas Lengkap;</li>
                      <li>Alamat tempat tinggal sesuai KTP;</li>
                      <li>Jenis kelamin;</li>
                      <li>Tanggal lahir;</li>
                      <li>Bidang usaha;</li>
                      <li>Nomor telepon yang aktif dihubungi;</li>
                      <li>Surat Keterangan Usaha (SKU) atau Nomor Induk Berusaha (NIB);</li>

                    </ol>
                  </div>
                </div><!-- End activity item-->


                <div class="activity-item d-flex">
                  <div class="activite-label">2023-06-02 08:50:21</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <h5>Kelengkapan Berkas untuk Validasi Data UMKM Kabupaten Maros</h5>
                    <p>berkas persyaratan pendaftaran Validasi Data UMKM Kabupaten Maros, berupa :</p>
                    <ol>
                      <li>Foto copy Kartu Keluarga (1 lembar);</li>
                      <li>Foto copy Surat Keterangan Usaha (SKU)/ Nomor Induk Berusaha (NIB);</li>
                      <li>Foto copy KTP (1 lembar);</li>
                      <li>Foto copy Rekening Bank BRI</li>
                      <li>Pas Photo ukuran 2 x 3 dan 3 x 4 (masing-masing 3 lembar)</li>
                    </ol>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2023-06-02 08:50:21</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    <h5>Batas Waktu Pengembalian Berkas Formulir Pendaftaran UMKM Kabupaten Maros dimulai tanggal 31 Juni 2023 sampai dengan 31 Desember 2023</h5>
                    
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

    </section>


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