

@push('css')
@endpush

<div class="mt-1">
    <table class="table table-bordered table-hover" id="data-catatan">
        <thead class="thead-dark">
            <tr>
                <th width="5%"><center>Id. </center></th>
                <th width="100px"><center>Lokasi</center></th>
                <th width="150px"><center>Tanggal</center></th>
                <th width="100px"><center>Suhu</center></th>
                <th width="150px"><center>desc</center></th>
                <th width="150px"><center>lama</center></th>
                <th width="30%"><center>foto</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catatan as $p)
                <tr style="">
                    <td><center>{{ $i = !isset($i)?1:++$i }}</center></td>
                    <td><center>{{ $p->lokasi }}</center></td>
                    <td><center>{{ $p->tanggal }}</center></td>
                    <td><center>{{ $p->suhu }}</center></td>
                    <td><center>{{ $p->desc }}</center></td>
                    <td><center>{{ $p->lama }} Hari<center>
                        <td>  
                            <img src="{{ asset('fotoPerjalanan/'.$p->foto) }}" alt="" style="width: 150px;">
                        </td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <script>
    window.print();
  </script>

<link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css" />
 <!-- jQuery -->
 <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('assets') }}/dist/js/demo.js"></script>
 <!-- Data Table -->

 <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.js"></script>
 <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>