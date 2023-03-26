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
            <h1>Absensi Karyawan</h1>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Karyawan</h3>
            <div class="card-tools">

            <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
                title="Collapse"
            >
                <i class="fas fa-minus"></i>
            </button>
            <button
                type="button"
                class="btn btn-tool"
                data-card-widget="remove"
                title="Remove"
            >
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            
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
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formProdukModal">
            <i class="fas fa-plus"></i> &nbsp; Tambah Karyawan
            </button>
            &nbsp;
            <a href="{{ route('export-produk') }}" class="btn btn-success mb-3">
                <i class="fa fa-file-excel"></i> Export
            </a>
            &nbsp;
            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#formImport">
                <i class="fa fa-file-excel"></i> Import
            </button>
            

            @include('produk.data')

        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">Footer</div> -->
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('produk.form')

@endsection

@push('js')
    <script>
        $('#data-produk').DataTable();
        
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
        $('#formProdukModal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const nama_produk = btn.data('nama_produk')
            const tanggal = btn.data('tanggal')
            const waktu_masuk = btn.data('waktu_masuk')
            const status = btn.data('status')
            const waktu_keluar = btn.data('waktu_keluar')
            if(mode === 'edit'){
                modal.find('.modal-title').text('Edit Data')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#tanggal').val(tanggal)
                modal.find('#waktu_masuk').val(waktu_masuk)
                modal.find('#status').val(status)
                modal.find('#waktu_keluar').val(waktu_keluar)
                modal.find('#methods').html('@method("PATCH")')
                modal.find('form').attr('action', `{{ url('produk') }}/${id}`)
            }else{
                modal.find('.modal-title').text('Tambah Data Absensi')
                modal.find('#nama_produk').val('')
                modal.find('#tanggal').val('')
                modal.find('#waktu_masuk').val('')
                modal.find('#status').val('')
                modal.find('#waktu_keluar').val('')
                modal.find('#methods').html('')
                modal.find('form').attr('action', '{{ url("produk") }}')
            }
        })
        
        $('#formProdukModal').on('shown.bs.modal', function(){
            $('#nama_produk').delay(1000).focus().select(); 
        })
    </script>
@endpush