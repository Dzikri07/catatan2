<!-- Modal -->
<div class="modal fade" id="formProdukModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="produk">
            @csrf
            <div id="methods"></div>
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">Nama Karyawan</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form-control-sm" id="nama_produk" placeholder=" " name="nama_produk">
                </div>
            </div>     
            <div class="form-group row">
              <label for="tanggal" class="col-sm-4 col-form-label col-form-label">Tanggal Masuk</label>
              <div class="col-sm-7">
                <input type="date" class="form-control form-control-sm" id="tanggal" placeholder=" " name="tanggal">
              </div>
          </div> 
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">Waktu Masuk</label>
            <div class="col-sm-7">
              <input type="time" class="form-control form-control-sm" id="waktu_masuk" placeholder=" " name="waktu_masuk">
            </div>
        </div>         
        <div class="form-group row">
          <label for="status" class="col-sm-4 col-form-label col-form-label">Status</label>
          <div class="col-sm-7">
            <select name="status" id="status" class="form-control">
              <option value="hadir">Hadir</option>
              <option value="sakit">Sakit</option>
              <option value="cuti">Cuti</option>
          </select>
          </div>
      </div>        
      <div class="form-group row">
        <label for="waktu_keluar" class="col-sm-4 col-form-label col-form-label">Waktu Selesai</label>
        <div class="col-sm-7">
          <input type="time" class="form-control form-control-sm" id="waktu_keluar" placeholder=" " name="waktu_keluar">
        </div>
    </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formImport" tabindex="-1" rol="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import data Absen</h5>
        <button type="button" class="close" data-dissmo="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('produk/import') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nama">File excel</label>
            <input type="file" name="import" id="import">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
          <button type="submit" class="btn btn-primary"  id="btn-btn-submit">upload</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->