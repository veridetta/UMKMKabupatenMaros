@extends('layouts.app')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Berkas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Berkas Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div id="text-error" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                <i class="bi bi-check-circle me-1"></i>
                <span id="message">Error</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Siswa</h5>
              <!-- Table with stripped rows -->
              <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Kartu Keluarga</th>
                    <th scope="col">Akta Kelahiran</th>
                    <th scope="col">Ijazah</th>
                    <th scope="col">Rapor</th>
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
              </table>
             
              @include('components.modal-upload-foto') 
             
              
            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->
  @push('js')
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function() {
        $('#text-error').hide()
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.siswa.index-document')}}",
            columns: [
                    {
                      "data":null,"sortable":false,
                      render: function(data,type,row,meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                      }
                    },
                    // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    // { data: 'id', name: 'id' },
                    { data: 'nama', name: 'nama' },
                    { data: 'nisn', name: 'nisn' },
                    { data: 'download_kartu_keluarga', name: 'download_kartu_keluarga',orderable: false, searchable: false},
                    { data: 'download_akta_kelahiran', name: 'download_akta_kelahiran',orderable: false, searchable: false},
                    { data: 'dwonload_ijazah', name: 'dwonload_ijazah',orderable: false, searchable: false},
                    { data: 'download_rapor', name: 'download_rapor',orderable: false, searchable: false},
                    { data: 'action', name : 'action', orderable: false, searchable: false}
                ],
            order: [[0, 'desc']]
        });
      });
      function editFunc(id){
          $.ajax({
            type:"POST",
            url: "{{ route('admin.siswa.edit-document')}}",
            data: { 
              id: id,
               _token : "{{csrf_token()}}"
            },
            dataType: 'json',
            success: function(res){
              $('.modal-title').html("Edit Data Berkas");
              $('#basicModal').modal('show');
              $('#id').val(res.data.id);
              
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
              url: "{{ route('admin.siswa.destroy-document')}}",
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
    
      $('#upload-image-form').submit(function(e)
      {
        let id = $('#id').val()
        e.preventDefault();
        let formData = new FormData(this);
        // $('#image-input-error').text('');

        $.ajax({
            type:'POST',
            url: "{{route('admin.siswa.update-document')}}",
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                // $('#kartu_keluarga').text("jjjj");

                console.log(response)
              if (response.success) {
              $('#basicModal').modal('hide');
                Swal.fire({
                  icon: 'success',
                  title: 'Data Berhasil Diubah',
                  showConfirmButton: true,
                })
                $('#dataTable').DataTable().ajax.reload()
                $('#upload-image-form').trigger('reset')

              }
            },
            error: function(response){

                $.each(response.responseJSON.errors, function (i, error) {
                // var el = $(document).find('[name="'+i+'"]');
                // el.after($('<span style="color: red;">'+error[0]+'</span>'));
                $('#text-error').show()
                $('#message').text(error[0]);
                });
                $('#basicModal').modal('hide');
                $('#upload-image-form').trigger('reset')

            }
        });
      });
    </script>
  @endpush
@endsection