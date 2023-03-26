<!-- Modal -->
<div class="modal fade" id="formCatatanModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="catatan" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Lokasi</label>
                <div class="col-sm-7">
                  <input type="text" readonly class="form-control form-control-sm" id="lokasi" placeholder=" " name="lokasi">
                </div>
            </div>     
            <div class="form-group row">
              <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Tanggal</label>
              <div class="col-sm-7">
                <input type="date" readonly class="form-control form-control-sm" id="tanggal" placeholder=" " name="tanggal">
              </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;waktu</label>
            <div class="col-sm-7">
              <input type="time" readonly class="form-control form-control-sm" id="waktu" placeholder=" " name="waktu">
            </div>
        </div>  
          <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Lama Menetap</label>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control form-control-sm" id="lama" placeholder="00 hari" name="lama">
            </div>
        </div> 
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Suhu</label>
            <div class="col-sm-7">
              <input type="number" readonly class="form-control form-control-sm" id="suhu" placeholder=" " name="suhu">
            </div>
        </div>         
        <div class="form-group row">
          <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;desc</label>
          <div class="col-sm-7">
            <input type="textarea" class="form-control form-control-sm" readonly id="desc" placeholder=" " name="desc">
          </div>
      </div>
      <label for="foto" class="col-sm-4 col-form-label col-form-label">foto</label>
    <div>
      </div>        
      <div id="img-wrapper" class="rounded shadow " >
        <div style div style="box-shadow: 0 0 20px 0 #000;padding: 13px;border-radius: 50%;">
        <img width="300" id="foto" alt="FotoPerjalanan">
      </div>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
       
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">form tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="catatan" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label for="nama_produk"class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Lokasi</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control form-control-sm" id="lokasi" placeholder=" " name="lokasi">
                </div>
            </div>     
            <div class="form-group row">
              <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Tanggal</label>
              <div class="col-sm-7">
                <input type="date" class="form-control form-control-sm" id="tanggal" placeholder=" " name="tanggal">
              </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;waktu</label>
            <div class="col-sm-7">
              <input type="time" class="form-control form-control-sm" id="waktu" placeholder=" " name="waktu">
            </div>
        </div>  
          <div class="form-group row">
            <label for="tanggal" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Lama Menetap</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form-control-sm" id="lama" placeholder="00 hari" name="lama">
            </div>
        </div> 
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;Suhu</label>
            <div class="col-sm-7">
              <input type="number" class="form-control form-control-sm" id="suhu" placeholder=" " name="suhu">
            </div>
        </div>         
        <div class="form-group row">
          <label for="nama_produk" class="col-sm-4 col-form-label col-form-label">&nbsp;&nbsp;desc</label>
          <div class="col-sm-7">
            <input type="textarea" class="form-control form-control-sm" id="desc" placeholder=" " name="desc">
          </div>
      </div>      
    <div>
      </div>        
      <div><label for="nama_produk" class="col-sm-4 col-form-label col-form-label">Foto</label>
      <div class="custom-file col-sm-7">
        <input type="file" class="custom-file-input" id="foto" name="foto">
        <label class="custom-file-label" for="foto">Choose file</label>
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
        <form method="POST" action="{{ url(request()->segment(1).'/produk/import') }}" enctype="multipart/form-data">
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