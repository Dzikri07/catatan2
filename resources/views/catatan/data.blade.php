<div class="mt-1">
  <table class="table table-bordered table-hover" id="data-catatan">
      <thead class="thead-dark">
          <tr>
              <th width="5%"><center>Id. </center></th>
              <th width="20px"><center>Lokasi</center></th>
              <th width="20px"><center>Tanggal</center></th>
              <th width="20px"><center>Suhu</center></th>
              <th width="20px"><center>desc</center></th>
              <th width="20%"><center>Aksi</center></th>
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
                  <td><center>

                    
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#formCatatanModal"
                       data-mode = "edit"
                       data-id="{{ $p->id }}"
                       data-tanggal="{{ $p->tanggal }}"
                       data-waktu="{{ $p->waktu }}"
                       data-lokasi="{{ $p->lokasi }}"
                       data-suhu="{{ $p->suhu }}"
                       data-lama="{{ $p->lama }}"
                       data-desc="{{ $p->desc }}"
                       data-foto="{{ $p->foto  }}">
                      
                        <i class="fas fa-edit"></i> &nbsp; Detail
                      </button>

                      <form action="{{ route('catatan.destroy', $p->id) }}" method="post" style="display: inline">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm btn-danger ml-1 remove" data-toggle="modal" data-target="#confirmModal">
                          <i class="fas fa-trash-alt"></i> &nbsp; Hapus
                          </button>
                      </form>
                      <center>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>

<!-- Dialog Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Apakah data <b id="data-dihapus"></b> akan dihapus..?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
      <button type="submit" class="btn btn-danger" id="btn-ya">&nbsp;Ya&nbsp;</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- End Dialog -->