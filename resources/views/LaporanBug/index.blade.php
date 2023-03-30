@extends('templates.layout')

@push('css')
@endpush

@section('isi')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Lapor Bug Aplikasi </h1>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
        
           
            <div class="card-tools">
           
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formLaporanBugModal">
                <i class="fas fa-plus"></i> &nbsp; Ajukan Laporan
                </button>
                &nbsp;
                <a href="{{ route('export-LaporanBug') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i> Export
                </a>
                &nbsp;
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                    <i class="fa fa-file-excel"></i> Import
                </button> &nbsp;
                <style>
                    button {
                      background-color: #11e2b5; /* warna latar belakang */
                      border: none; /* hilangkan border */
                      color: white; /* warna teks */
                      padding: 8px 18px; /* jarak padding */
                      text-align: center; /* teks rata tengah */
                      text-decoration: none; /* hilangkan underline */
                      display: inline-block; /* tampilkan inline */
                      font-size: 16px; /* ukuran font */
                      margin: 2px 2px; /* margin */
                      cursor: pointer; /* tampilkan cursor */
                      border-radius: 4px; /* bentuk border */
                    }
                  </style>
                  <button class="mb-40" onclick="window.print();">Cetak</button>
                  <p></p>
            <!-- Alert -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>                
            @endif

            <!-- Button trigger modal -->
            
            

            @include('LaporanBug.data')

        </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('LaporanBug.form')

@endsection

@push('js')
    <script>
        $('#data-LaporanBug').DataTable();
        
        // js animation
        $('.alert-success').fadeTo(2000,500).slideUp(500, function () {
            $('.alert-success').slideUp(500)
        })

        // button
        $('.remove').on('click', function (e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            $('#data-dihapus').text(data)

            const form = $(this).closest('tr').find('form')
            $('#btn-ya').on('click', function() {
                form.submit()
            })
        })
        
        //update or input
        $('#formLaporanBugModal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const jenis = btn.data('jenis')
            const deskripsi = btn.data('deskripsi')
            const tgl_kejadian = btn.data('tgl_kejadian')
            const pelapor = btn.data('pelapor')
            const status = btn.data('status')
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data')
                modal.find('#jenis').val(jenis)
                modal.find('#deskripsi').val(deskripsi)
                modal.find('#tgl_kejadian').val(tgl_kejadian)
                modal.find('#pelapor').val(pelapor)
                modal.find('#status').val(status)
                modal.find('#methods').html('@method("PATCH")')
                modal.find('form').attr('action', `{{ url('LaporanBug') }}/${id}`)
            }else{
                modal.find('.modal-title').text('Laporkan')
                modal.find('#jenis').val('')
                modal.find('#deskripsi').val('')
                modal.find('#tgl_kejadian').val('')
                modal.find('#pelapor').val('')
                modal.find('#status').val('')
                modal.find('#methods').html('')
                modal.find('form').attr('action', '{{ url("LaporanBug") }}')
            }
        })
        
        $('#formLaporanBugModal').on('shown.bs.modal', function(){
            $('#jenis').delay(1000).focus().select(); 
        })
    </script>
@endpush