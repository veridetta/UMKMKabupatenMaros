@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin-kab.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Sekolah</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Siswa</h5>
              <div class="text-end mb-4">
                <button onclick="insertFunct()" class="btn btn-primary">Tambah Sekolah</button>
              </div>
              <!-- Table with stripped rows -->
              <table id="dataTablee" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Sekolah</th>
                    <th scope="col">NSM</th>
                    <th scope="col">NPSN</th>
                    <th scope="col">ACTION</th>
                    
                  </tr>
                </thead>
              </table>
             
              @include('components.modal-sekolah') 
             
              
            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
  @push('js')
  <!-- <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script> -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <!-- <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
  <!-- <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     
      $(document).ready(function() {
          var table = $('#dataTablee').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{route('admin-kab.sekolah.data-sekolah')}}",
              columns: [
                      {
                        "data":null,"sortable":false,
                        render: function(data,type,row,meta){
                          return meta.row + meta.settings._iDisplayStart + 1;
                        }
                      },
                      { data: 'nama_sekolah', name: 'nama_sekolah' },
                      { data: 'nsm', name: 'nsm' },
                      { data: 'npsn', name: 'npsn' },
                      { data: 'action', name: 'action', orderable: false, searchable: false  },
                     
                  ],
                                                
            //   order: [[1, 'asc']]
          });        
      });
    function insertFunct(){
            $('.modal-title').html("Tambah Data");
            $('#basicModal').modal('show',{keyboard: false});

            $('#simpan').click(function(){ 
                var nama_sekolah = $('#username').val();
                var password = $('#password').val();
                 $.ajax({
                    url: "{{route('admin-kab.sekolah.tambah-sekolah')}}",
                    type: "POST",
                    data: {
                        username: nama_sekolah,
                        password: password,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data){
                        $('#basicModal').modal('hide');
                        $('#username').val('');
                        $('#password').val('');
                        if(data.success){
                            Swal.fire(
                                'save!',
                                data.success,
                                'success'
                            ).then(function(){
                                $('#dataTablee').DataTable().ajax.reload()
                            });
                        }else{
                            Swal.fire(
                                'Terhapus!',
                                 data.error,
                                'error'
                            ).then(function(){
                                $('#dataTablee').DataTable().ajax.reload()
                            });
                            
                        }    
                    }
                });
              
            
            });

    }
    function hapusFunct(id){
        Swal.fire({
            title: 'Anda Yakin ?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{route('admin-kab.sekolah.hapus-sekolah')}}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{csrf_token()}}"
                    },
                    dataType: 'json',
                    success: function(data){
                        if(data.success){
                            $('#dataTablee').DataTable().ajax.reload()
                            Swal.fire(
                                'hapus!',
                                data.success,
                                'success')
                        }else{
                            Swal.fire(
                                'Terhapus!',
                                 data.error,
                                'error'
                            ).then(function(){
                                $('#dataTablee').DataTable().ajax.reload()
                            });
                            
                        }    
                    }
                });
            }
        })
    }  
      
    </script>

    
  @endpush
@endsection