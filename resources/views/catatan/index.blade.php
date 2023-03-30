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
            <h1>catatan</h1>
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
            <h3 class="card-title">Form Catatan</h3>
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
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
            <i class="fas fa-plus"></i> &nbsp; Tambah Catatan
            </button>
            &nbsp;
            <a href="{{ route('export-produk') }}" class="btn btn-success mb-3">
                <i class="fa fa-file-excel"></i> Export
            </a>
            &nbsp;
            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#formImport">
                <i class="fa fa-file-excel"></i> Import
            </button> &nbsp;
            <a href="{{ url('tambah') }}" target="_blank" class="btn btn-danger btn-aksi me-md-2 mb-3">
                <i class="fas fa-print fa-lg"></i></a>
           
            @include('catatan.data')

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

    @include('catatan.form')

@endsection

@push('js')
    <script>
        $('#data-catatan').DataTable();
        
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
        $('#formCatatanModal').on('show.bs.modal', function(e){
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const tanggal = btn.data('tanggal')
            const waktu = btn.data('waktu')
            const lokasi = btn.data('lokasi')
            const suhu = btn.data('suhu')
            const desc = btn.data('desc')
            const lama = btn.data('lama')
            const foto = btn.data('foto')
            console.log(lama, suhu, desc, waktu, tanggal, id)

            if(mode === 'edit'){
                modal.find('.modal-title').text('Detail')
                modal.find('#id').val(id)
                modal.find('#tanggal').val(tanggal)
                modal.find('#waktu').val(waktu)
                modal.find('#lokasi').val(lokasi)
                modal.find('#suhu').val(suhu)
                modal.find('#lama').val(lama)
                modal.find('#desc').val(desc)
                modal.find('#foto').attr('src', '/fotoPerjalanan/'+foto)
                modal.find('#methods').html('@method("PATCH")')
                modal.find('form').attr('action', `{{ url('catatan') }}/${id}`)
            }else{
                modal.find('.modal-title').text('Detail')
                modal.find('#id').val('')
                modal.find('#tanggal').val('')
                modal.find('#waktu').val('')
                modal.find('#lokasi').val('')
                modal.find('#suhu').val('')
                modal.find('#lama').val('')
                modal.find('#desc').val('')
                  
                modal.find('#methods').html('')
                modal.find('form').attr('action', '{{ url("catatan") }}')
            }
        })
        
        $('#formCatatanModal').on('shown.bs.modal', function(){
            $('#nama_produk').delay(1000).focus().select(); 
        })

    </script>
@endpush