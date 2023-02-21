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
            <div class="card-body">
              <h5 class="card-title">Data Siswa</h5>
              <!-- Table with stripped rows -->
              <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tanggal Lahir</th>
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
    <script>
      function format(d) {
          // `d` is the original data object for the row
          return (
              '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' +
              '<b>Data Diri</b>' +
              '<tr>' +
              '<td>No Pendaftaran:</td>' +
              '<td>' +
              d.no_pendaftaran +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Jalur:</td>' +
              '<td>' +
              d.jalur +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Asal Sekolah:</td>' +
              '<td>' +
              d.asal_sekolah +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>NPSN Asal Sekolah:</td>' +
              '<td>' +
              d.npsn_asal_sekolah +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>NISN:</td>' +
              '<td>' +
              d.nisn +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>NIK:</td>' +
              '<td>' +
              d.nik +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Kewernegaraan:</td>' +
              '<td>' +
              d.kewernegaraan +
              '</td>' +
              '</tr>' +
              '<tr>' +
              '<td>Nama Lengkap:</td>' +
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
              '<td>Nama Lengkap:</td>' +
              '<td>' +
              d.nama_lengkap +
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
            ajax: "{{route('admin.siswa.data-siswa')}}",
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
                    { data: 'nama_lengkap', name: 'nama_lengkap' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                    { data: 'nisn', name: 'nisn' },
                    { data: 'nik', name: 'nik' },
                    { data: 'tanggal_lahir', name: 'tanggal_lahir' },
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
            url: "{{ route('admin.siswa.editDataSiswa')}}",
            data: { 
              id: id,
               _token : "{{csrf_token()}}"
            },
            dataType: 'json',
            success: function(res){

              $('.modal-title').html("Edit Data");
              $('#scrollingModal').modal('show',{keyboard: false});
              $('#id').val(res.data.id);
              $('#asal_sekolah').val(res.data.asal_sekolah);
              $('#npsn_asal_sekolah').val(res.data.npsn_asal_sekolah);
              $('#nik').val(res.data.nik);
              $('#kewernegaraan').val(res.data.kewernegaraan);
              $('#nama_lengkap').val(res.data.nama_lengkap);
              $('#tempat').val(res.data.tempat);
              $('#tanggal_lahir').val(changeDateFormat(res.data.tanggal_lahir));
              $('#jenis_kelamin').val(res.data.jenis_kelamin);
              $('#anak_dari').val(res.data.anak_dari);
              $('#jumlah_saudara').val(res.data.jumlah_saudara);
              $('#agama').val(res.data.agama);
              $('#cita_cita').val(res.data.cita_cita);
              $('#hobi').val(res.data.hobi);
              $('#email').val(res.data.email);
              $('#handphone').val(res.data.handphone);
              $('#biaya_sekolah').val(res.data.biaya_sekolah);
              $('#paud').val(res.data.paud);
              $('#tk').val(res.data.tk);
              $('#hepatitis').val(res.data.hepatitis);
              $('#polio').val(res.data.polio);
              $('#bcg').val(res.data.bcg);
              $('#campak').val(res.data.campak);
              $('#dpt').val(res.data.dpt);
              $('#covid').val(res.data.covid);
              $('#no_kip').val(res.data.no_kip);
              $('#no_kk').val(res.data.no_kk);
              $('#kepala_keluarga').val(res.data.kepala_keluarga);
              $('#stts_tempat_tinggal').val(res.data.stts_tempat_tinggal);
              $('#alamat').val(res.data.alamat);
              $('#rt').val(res.data.rt);
              $('#rw').val(res.data.rw);
              $('#desa').val(res.data.desa);
              $('#kecamatan').val(res.data.kecamatan);
              $('#kabupaten').val(res.data.kabupaten);
              $('#provinsi').val(res.data.provinsi);
              $('#kode_pos').val(res.data.kode_pos);
              $('#koordinat').val(res.data.koordinat_alamat);
              $('#transportasi').val(res.data.transportasi);
              $('#jarak').val(res.data.jarak);
              $('#waktu_tempu').val(res.data.waktu_tempu);  
              $('#stts_ayah').val(res.data.stts_ayah);  
              $('#nik_ayah').val(res.data.nik_ayah);  
              $('#nama_ayah').val(res.data.nama_ayah);  
              $('#tempat_lahir_ayah').val(res.data.tempat_lahir_ayah);  
              $('#tgl_lahir_ayah').val(res.data.tgl_lahir_ayah);  
              $('#pendidikan_ayah').val(res.data.pendidikan_ayah);  
              $('#pekerjaan_ayah').val(res.data.pekerjaan_ayah);  
              $('#penghasilan_ayah').val(res.data.penghasilan_ayah);  
              $('#no_hp_ayah').val(res.data.no_hp_ayah);
              $('#stts_ibu').val(res.data.stts_ibu);  
              $('#nik_ibu').val(res.data.nik_ibu);  
              $('#nama_ibu').val(res.data.nama_ibu);  
              $('#tempat_lahir_ibu').val(res.data.tempat_lahir_ibu);  
              $('#tgl_lahir_ibu').val(res.data.tgl_lahir_ibu);  
              $('#pendidikan_ibu').val(res.data.pendidikan_ibu);  
              $('#pekerjaan_ibu').val(res.data.pekerjaan_ibu);  
              $('#penghasilan_ibu').val(res.data.penghasilan_ibu);  
              $('#no_hp_ibu').val(res.data.no_hp_ibu);
              
              $('#nik_wali').val(res.data.nik_wali);  
              $('#nama_wali').val(res.data.nama_wali);
              $('#tgl_lahir_wali').val(res.data.tgl_lahir_wali);  
              $('#pendidikan_wali').val(res.data.pendidikan_wali);  
              $('#pekerjaan_wali').val(res.data.pekerjaan_wali);  
              $('#penghasilan_wali').val(res.data.penghasilan_wali);  
              $('#no_hp_wali').val(res.data.no_hp_wali);  
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
              url: "{{ route('admin.siswa.hapusDataSiswa')}}",
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
        url: "{{route('admin.siswa.updateDataSiswa')}}",
        data:{
          id : $('#id').val(),
          asal_sekolah: $('#asal_sekolah').val(),
          npsn_asal_sekolah: $('#npsn_asal_sekolah').val(),
          nik: $('#nik').val(),
          kewernegaraan: $('#kewernegaraan').val(),
          nama_lengkap: $('#nama_lengkap').val(),
          tempat: $('#tempat').val(),
          tanggal_lahir: $('#tanggal_lahir').val(),
          jenis_kelamin: $('#jenis_kelamin').val(),
          anak_dari: $('#anak_dari').val(),
          jumlah_saudara: $('#jumlah_saudara').val(),
          agama: $('#agama').val(),
          cita_cita: $('#cita_cita').val(),
          hobi: $('#hobi').val(),
          email: $('#email').val(),
          handphone: $('#handphone').val(),
          biaya_sekolah: $('#biaya_sekolah').val(),
          paud: $('#paud').val(),
          tk: $('#tk').val(),
          hepatitis: $('#hepatitis').val(),
          polio: $('#polio').val(),
          bcg: $('#bcg').val(),
          campak: $('#campak').val(),
          dpt: $('#dpt').val(),
          covid: $('#covid').val(),
          no_kip: $('#no_kip').val(),
          no_kk: $('#no_kk').val(),
          kepala_keluarga: $('#kepala_keluarga').val(),
          stts_tempat_tinggal: $('#stts_tempat_tinggal').val(),
          alamat: $('#alamat').val(),
          rt: $('#rt').val(),
          rw: $('#rw').val(),
          desa: $('#desa').val(),
          kecamatan: $('#kecamatan').val(),
          kabupaten: $('#kabupaten').val(),
          provinsi: $('#provinsi').val(),
          kode_pos: $('#kode_pos').val(),
          koordinat: $('#koordinat').val(),
          transportasi: $('#transportasi').val(),
          jarak: $('#jarak').val(),
          waktu_tempu: $('#waktu_tempu').val(),
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
              url: "{{ route('admin.siswa.update-status')}}",
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
                    'Siswa berhasil diterima.',
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
                <td>No Pendaftaran:</td>
                <td>@{{no_pendaftaran}}</td>
              </tr>
              <tr>
                <td>Jalur:</td>
                <td>@{{jalur}}</td>
              </tr>
              <tr>
              <td>Asal Sekolah:</td>
                <td>@{{asal_sekolah}}</td>
              </tr>
              <tr>
                <td>NPSN Asal Sekolah:</td>
                <td>@{{npsn_asal_sekolah}}</td>
              </tr>
              <tr>
                <td>NISN:</td>
                <td>@{{nisn}}</td>
              </tr>
              <tr>
                <td>NIK:</td>
                <td>@{{nik}}</td>
              </tr>
              <tr>
                <td>Kewernegaraan:</td>
                <td>@{{kewernegaraan}}</td>
              </tr>
              <tr>
                <td>Nama Lengkap:</td>
                <td>@{{nama_lengkap}}</td>
              </tr>
              <tr>
                <td>Tempat Lahir:</td>
                <td>@{{tempat}}</td>
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
                <td>Email:</td>
                <td>@{{email}}</td>
              </tr>
              <tr>
                <td>No. Handphone:</td>
                <td>
                  @{{handphone}}
                </td>
              </tr>
            </table>
          </div>
          <div class="col-sm-4">
              <table cellpadding="5" cellspacing="0" style="padding-left:50px;">
              <b>Data Orang Tua / Wali</b>
              <tr>
                <td>Status Ayah:</td>
                <td>@{{stts_ayah}}</td>
              </tr>
              <tr>
                <td>Nama Ayah:</td>
                <td>@{{nama_ayah}}</td>
              </tr>
              <tr>
              <td>Tempat dan Tanggal Lahir:</td>
                <td>@{{tempat_lahir_ayah}},@{{tgl_lahir_ayah}}</td>
              </tr>
              <tr>
                <td>Pekerjaan:</td>
                <td>@{{pekerjaan_ayah}}</td>
              </tr>
              <tr>
                <td>No. HP:</td>
                <td>@{{no_hp_ayah}}</td>
              </tr>
              <tr>
                <td>Status Ibu:</td>
                <td>@{{stts_ibu}}</td>
              </tr>
              <tr>
                <td>Nama Ibu:</td>
                <td>@{{nama_ibu}}</td>
              </tr>
              <tr>
              <td>Tempat dan Tanggal Lahir:</td>
                <td>@{{tempat_lahir_ibu}},@{{tgl_lahir_ibu}}</td>
              </tr>
              <tr>
                <td>Pekerjaan:</td>
                <td>@{{pekerjaan_ibu}}</td>
              </tr>
              <tr>
                <td>No. HP:</td>
                <td>@{{no_hp_ibu}}</td>
              </tr>
              <tr>
                <td>Nama Wali:</td>
                <td>@{{nama_wali}}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir:</td>
                <td>@{{tgl_lahir_wali}}</td>
              </tr>
              <tr>
                <td>Pekerjaan:</td>
                <td>@{{pekerjan_wali}}</td>
              </tr>
              <tr>
                <td>No. HP:</td>
                <td>@{{no_hp_wali}}</td>
              </tr>
            </table>
          </div>
          
          <div class="col-sm-4">
              <table cellpadding="5" cellspacing="0" style="padding-left:50px;">
                <b>Data Alamat</b>
                <tr>
                    <td>Status Tempat Tinggal: </td>
                    <td>@{{stts_tempat_tinggal}}</td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td>@{{alamat}}</td>
                </tr>
                <tr>
                    <td>RT/RW:</td>
                    <td>@{{rt}}/@{{rw}}</td>
                </tr>
                <tr>
                    <td>Desa:</td>
                    <td>@{{desa}}</td>
                </tr>
                <tr>
                    <td>Kecamatan:</td>
                    <td>@{{kecamatan}}</td>
                </tr>
                <tr>
                    <td>Kabupaten:</td>
                    <td>@{{kabupaten}}</td>
                </tr>
                <tr>
                    <td>Provinsi:</td>
                    <td>@{{provinsi}}</td>
                </tr>
                <tr>
                    <td>kode Pos:</td>
                    <td>@{{kode_pos}}</td>
                </tr>
                <tr>
                    <td>Koordinat:</td>
                    <td>  
                      <iframe 
                        width="170" 
                        height="170" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q=@{{koordinat_alamat}}&hl=es&z=14&amp;output=embed">
                    
                    </td>
                </tr>
            </table>
          </div>  
          
        </div>
      </div>
       
 
    </script>
    
  @endpush
@endsection