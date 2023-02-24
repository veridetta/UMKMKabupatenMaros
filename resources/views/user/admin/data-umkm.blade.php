@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    <style>
      #cover-spin {
        position:fixed;
        width:100%;
        left:0;right:0;top:0;bottom:0;
        background-color: rgba(255,255,255,0.7);
        z-index:9999;
        display:none;
      }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
      

    <main id="main" class="main">
      <div id="cover-spin">
        <div class="position-absolute top-50 start-50 spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
          </div>
      </div>
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body table-responsive">
              <h5 class="card-title">Data UMKM</h5>
              <!-- Table with stripped rows -->
              <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Jenis Usaha</th>
                    <th scope="col">Nomor Induk Kependudukan (NIK)</th>
                    <th scope="col">Nomor NIB / P-IRT/NPWP</th>
                    <th scope="col">Alamat Rumah</th>
                    <th scope="col">Alamat Usaha</th>
                    <th scope="col">Modal</th>
                    <th scope="col">Jumlah Karyawan</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              </table>
             
              @include('components.modal') 
             
              
            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
  @push('js')
  <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      
      function format(d) {
          // `d` is the original data object for the row
          return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' +
            '<b>Data Diri</b>' +
            '<tr>' +
            '<td>Nama Pemilik:</td>' +
            '<td>' +
            d.nama_lengkap +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Tempat Lahir:</td>' +
            '<td>' +
            d.tempat +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Tanggal Lahir:</td>' +
            '<td>' +
            d.tanggal_lahir +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Jenis Kelamin:</td>' +
            '<td>' +
            d.jenis_kelamin +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Agama:</td>' +
            '<td>' +
            d.agama +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Kewernegaraan:</td>' +
            '<td>' +
            d.kewernegaraan +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nama Usaha:</td>' +
            '<td>' +
            d.nama_usaha +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Jenis Usaha:</td>' +
            '<td>' +
            d.jenis_usaha +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nomor Induk Kependudukan (NIK):</td>' +
            '<td>' +
            d.nik +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nomor NIB / P-IRT/NPWP:</td>' +
            '<td>' +
            d.nib +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Modal:</td>' +
            '<td>' +
            d.modal +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Jumlah Karyawan:</td>' +
            '<td>' +
            d.jumlah_karyawan +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Tanggal Mulai Usaha:</td>' +
            '<td>' +
            d.tanggal_mulai_usaha +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Email:</td>' +
            '<td>' +
            d.email +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>No. Handphone:</td>' +
            '<td>' +
            d.handphone +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Alamat Rumah:</td>' +
            '<td>' +
            d.alamat_rumah +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Alamat Usaha:</td>' +
            '<td>' +
            d.alamat_usaha +
            '</td>' +
            '</tr>' +
            '</table>'


              
          );
      }
      $(document).ready(function() {
        // $.ajaxSetup({
        //     headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
      var template = Handlebars.compile($("#details-template").html());

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.umkm.data-umkm')}}",
            columns: [
                      {
                        "className":      'dt-control',
                        "orderable":      false,
                        "searchable":     false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {
                      "data":null,"sortable":false,
                      render: function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                      }
                    },
                    { data: 'nama_pemilik', name: 'nama_pemilik' },
                    { data: 'nama_usaha', name: 'nama_usaha' },
                    { data: 'jenis_usaha', name: 'jenis_usaha' },
                    { data: 'nik', name: 'nik' },
                    { data: 'nib', name: 'nib' },
                    { data: 'alamat_rumah', name: 'alamat_rumah' },
                    { data: 'alamat_usaha', name: 'alamat_usaha' },
                    { data: 'modal', name: 'modal' },
                    { data: 'jumlah_karyawan', name: 'jumlah_karyawan' },
                    { data: 'email', name: 'email' },
                    { data: 'no_hp', name: 'no_hp' },
                    { data: 'action', name : 'action', orderable: false, searchable: false}
                ],
                dom: 'Bfrtip',
                buttons: [
                { 
                  extend: 'excelHtml5',
                  text: '<i class="bi bi-file-earmark-excel-fill"></i>',
                  className:'btn btn-primary btn-sm',
                  titleAttr:'Excel',
                  init: function(api, node, config) {
                      $(node).removeClass('dt-button')
                    }
                },
                { 
                  extend: 'pdfHtml5',
                  text: '<i class="bi bi-file-earmark-pdf-fill"></i>',
                  className:'btn btn-secondary btn-sm',
                  titleAttr:'PDF',
                  customize: function (doc) {
                      doc.pageOrientation = 'landscape';
                  },
                  init: function(api, node, config) {
                      $(node).removeClass('dt-button')
                    }
                },
               
                ],
            order: [[1, 'asc']]
        });
            // Add event listener for opening and closing details
          $('#dataTable tbody').on('click', 'td.dt-control', function () {
              var tr = $(this).closest('tr');
              var row = table.row( tr );

              if ( row.child.isShown() ) {
                  // This row is already open - close it
                  row.child.hide();
                  tr.removeClass('shown');
              }
              else {
                  // Open this row
                  row.child( template(row.data()) ).show();
                  tr.addClass('shown');
              }
          });
      });

      
      function editFunc(id){
          $.ajax({
            type:"POST",
            url: "{{ route('admin.umkm.editDataUmkm')}}",
            data: { 
              id: id,
               _token : "{{csrf_token()}}"
            },
            dataType: 'json',
            success: function(res){

              $('.modal-title').html("Edit Data");
              $('#scrollingModal').modal('show',{keyboard: false});
              $('#id').val(res.data.id);
              $('#nama_pemilik').val(res.data.nama_pemilik);
              $('#tempat_lahir').val(res.data.tempat_lahir);
              $('#tanggal_lahir').val(res.data.tanggal_lahir);
              $('#jenis_kelamin').val(res.data.jenis_kelamin);
              $('#agama').val(res.data.agama);
              $('#kewarganegaraan').val(res.data.kewarganegaraan);
              $('#nama_usaha').val(res.data.nama_usaha);
              $('#jenis_usaha').val(res.data.jenis_usaha);
              $('#nik').val(res.data.nik);
              $('#nib').val(res.data.nib);
              $('#modal').val(res.data.modal);
              $('#jumlah_karyawan').val(res.data.jumlah_karyawan);
              $('#tanggal_mulai_usaha').val(res.data.tanggal_mulai_usaha);
              $('#email').val(res.data.email);
              $('#no_hp').val(res.data.no_hp);
              $('#alamat_rumah').val(res.data.alamat_rumah);
              $('#rt_rumah').val(res.data.rt_rumah);
              $('#rw_rumah').val(res.data.rw_rumah);
              $('#desa_rumah').val(res.data.desa_rumah);
              $('#kecamatan_rumah').val(res.data.kecamatan_rumah);
              $('#kabupaten_rumah').val(res.data.kabupaten_rumah);
              $('#provinsi_rumah').val(res.data.provinsi_rumah);
              $('#kode_pos_rumah').val(res.data.kode_pos_rumah);
              $('#alamat_usaha').val(res.data.alamat_usaha);
              $('#rt_usaha').val(res.data.rt_usaha);
              $('#rw_usaha').val(res.data.rw_usaha);
              $('#desa_usaha').val(res.data.desa_usaha);
              $('#kecamatan_usaha').val(res.data.kecamatan_usaha);
              $('#kabupaten_usaha').val(res.data.kabupaten_usaha);
              $('#provinsi_usaha').val(res.data.provinsi_usaha);
              $('#kode_pos_usaha').val(res.data.kode_pos_usaha);
            }
          });
      }
      function hapusFunc(id){
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data akan dihapus!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"POST",
              url: "{{ route('admin.umkm.hapusDataUmkm')}}",
              data: { 
                id: id,
                 _token : "{{csrf_token()}}"
              },
              dataType: 'json',
              success: function(res){
                if(res.success){
                  Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success'
                  ).then(function(){
                     $('#dataTable').DataTable().ajax.reload()
                  });
                }
              }
            });
          }
        })
      }

      function changeDateFormat(date) {
        var now = new Date(date);
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        return today = now.getFullYear()+"-"+(month)+"-"+(day) ;
      }
      $('#simpan').on('click',function(){
       $.ajax({
        type:"POST",
        dataType: 'json',
        url: "{{route('admin.umkm.updateDataUmkm')}}",
        data:{
          id : $('#id').val(),
          nama_pemilik: $('#nama_pemilik').val(),
          tempat_lahir: $('#tempat_lahir').val(),
          tanggal_lahir: $('#tanggal_lahir').val(),
          jenis_kelamin: $('#jenis_kelamin').val(),
          agama: $('#agama').val(),
          kewarganegaraan: $('#kewarganegaraan').val(),
          nama_usaha: $('#nama_usaha').val(),
          jenis_usaha: $('#jenis_usaha').val(),
          nik: $('#nik').val(),
          nib: $('#nib').val(),
          modal: $('#modal').val(),
          jumlah_karyawan: $('#jumlah_karyawan').val(),
          tanggal_mulai_usaha: $('#tanggal_mulai_usaha').val(),
          email: $('#email').val(),
          no_hp: $('#no_hp').val(),
          alamat_rumah: $('#alamat_rumah').val(),
          rt_rumah: $('#rt_rumah').val(),
          rw_rumah: $('#rw_rumah').val(),
          desa_rumah: $('#desa_rumah').val(),
          kecamatan_rumah: $('#kecamatan_rumah').val(),
          kabupaten_rumah: $('#kabupaten_rumah').val(),
          provinsi_rumah: $('#provinsi_rumah').val(),
          kode_pos_rumah: $('#kode_pos_rumah').val(),
          alamat_usaha: $('#alamat_usaha').val(),
          rt_usaha: $('#rt_usaha').val(),
          rw_usaha: $('#rw_usaha').val(),
          desa_usaha: $('#desa_usaha').val(),
          kecamatan_usaha: $('#kecamatan_usaha').val(),
          kabupaten_usaha: $('#kabupaten_usaha').val(),
          provinsi_usaha: $('#provinsi_usaha').val(),
          kode_pos_usaha: $('#kode_pos_usaha').val(),
          "_token" : "{{csrf_token()}}"
        },
        success:function(res){  
          $('#dataTable').DataTable().ajax.reload()
          if(res.success){
            console.log(res);
            $('#scrollingModal').modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Data Berhasil Diubah',
              showConfirmButton: true,
            })
          }
        }
       })
      })

      function editStatus(id){

        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data tidak bisa diubah ketika status sudah di konfirmasi!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Terima'
        }).then((result) => {
          if (result.value) {
            $('#cover-spin').show(0);
            $.ajax({
              type:"POST",
              url: "{{ route('admin.umkm.update-status')}}",
              data: { 
                id: id,
                 _token : "{{csrf_token()}}"
              },
              dataType: 'json',
              success: function(res){
                if(res.success){
                  $('#cover-spin').hide(0);
                  Swal.fire(
                    'Berhasil!',
                    'UMKM berhasil diterima.',
                    'success'
                  ).then(function(){
                      $('#dataTable').DataTable().ajax.reload()
                      
                  });
                }
              }
            });
          }
        })
      }

      


      
    </script>

    <script id="details-template" type="text/x-handlebars-template">

      <div class="container">
        <div class="row">
          <div class="col-sm-4">
              <table cellpadding="5" cellspacing="0" style="padding-left:50px;">
              <b>Data Diri</b>
              <tr>
                <td>Nama Pemilik:</td>
                <td>@{{nama_pemilik}}</td>
              </tr>
              <tr>
                <td>Tempat Lahir:</td>
                <td>@{{tempat_lahir}}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir:</td>
                <td>@{{tanggal_lahir}}</td>
              </tr>
              <tr>
                <td>Jenis Kelamin:</td>
                <td>@{{jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>Agama:</td>
                <td>@{{agama}}</td>
              </tr>
              <tr>
                <td>Kewarganegaraan:</td>
                <td>@{{kewarganegaraan}}</td>
              </tr>
              <tr>
                <td>Nomor Induk Kependudukan (NIK):</td>
                <td>@{{nik}}</td>
              </tr>
              <tr>
                <td>Email:</td>
                <td>@{{email}}</td>
              </tr>
              <tr>
                <td>No Handphone:</td>
                <td>@{{no_hp}}</td>
              </tr>
            </table>
          </div>
          <div class="col-sm-4">
              <table cellpadding="5" cellspacing="0" style="padding-left:50px;">
              <b>Data Usaha</b>
              <tr>
                <td>Nama Usaha:</td>
                <td>@{{nama_usaha}}</td>
              </tr>
              <tr>
                <td>Jenis Usaha:</td>
                <td>@{{jenis_usaha}}</td>
              </tr>
              <tr>
                <td>Nomor NIB / P-IRT / NPWP:</td>
                <td>@{{nib}}</td>
              </tr>
              <tr>
                <td>Modal:</td>
                <td>@{{modal}}</td>
              </tr>
              <tr>
                <td>Jumlah Karyawan:</td>
                <td>@{{jumlah_karyawan}}</td>
              </tr>
              <tr>
                <td>Tanggal Mulai Usaha:</td>
                <td>@{{tanggal_mulai_usaha}}</td>
              </tr>
              
            </table>
          </div>
          
          <div class="col-sm-4">
              <table cellpadding="5" cellspacing="0" style="padding-left:50px;">
                <b>Data Alamat</b>
                <tr>
                  <td>Alamat Rumah:</td>
                  <td>@{{alamat_rumah}}</td>
                </tr>
                <tr>
                  <td>RT Rumah:</td>
                  <td>@{{rt_rumah}}</td>
                </tr>
                <tr>
                  <td>RW Rumah:</td>
                  <td>@{{rw_rumah}}</td>
                </tr>
                <tr>
                  <td>Desa Rumah:</td>
                  <td>@{{desa_rumah}}</td>
                </tr>
                <tr>
                  <td>Kecamatan Rumah:</td>
                  <td>@{{kecamatan_rumah}}</td>
                </tr>
                <tr>
                  <td>Kabupaten Rumah:</td>
                  <td>@{{kabupaten_rumah}}</td>
                </tr>
                <tr>
                  <td>Provinsi Rumah:</td>
                  <td>@{{provinsi_rumah}}</td>
                </tr>
                <tr>
                  <td>Kode Pos Rumah:</td>
                  <td>@{{kode_pos_rumah}}</td>
                </tr>
                <tr>
                  <td>Alamat Usaha:</td>
                  <td>@{{alamat_usaha}}</td>
                </tr>
                <tr>
                  <td>RT Usaha:</td>
                  <td>@{{rt_usaha}}</td>
                </tr>
                <tr>
                  <td>RW Usaha:</td>
                  <td>@{{rw_usaha}}</td>
                </tr>
                <tr>
                  <td>Desa Usaha:</td>
                  <td>@{{desa_usaha}}</td>
                </tr>
                <tr>
                  <td>Kecamatan Usaha:</td>
                  <td>@{{kecamatan_usaha}}</td>
                </tr>
                <tr>
                  <td>Kabupaten Usaha:</td>
                  <td>@{{kabupaten_usaha}}</td>
                </tr>
                <tr>
                  <td>Provinsi Usaha:</td>
                  <td>@{{provinsi_usaha}}</td>
                </tr>
                <tr>
                  <td>Kode Pos Usaha:</td>
                  <td>@{{kode_pos_usaha}}</td>
                </tr>
            </table>
          </div>  
          
        </div>
      </div>
       
 
    </script>
    
  @endpush
@endsection