<!-- Modal -->
<div class="modal fade" id="formLaporanBugModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="LaporanBug">
            @csrf
            <div id="methods"></div>
            <div class="form-group row">
                <label for="jenis" class="col-sm-4 col-form-label col-form-label">Jenis Bug</label>
                <div class="col-sm-7">
                  <select class="form-control" id="jenis" name="jenis">
                    <option value="functional_error">Functional Error</option>
                    <option value="performance_defects">Performance Defects</option>
                    <option value="usability_defects">Usability Defects</option>
                    <option value="compatibility_error">Compatibility Error</option>
                    <option value="security_error">Security Error</option>
                    <option value="syntax_error">Syntax Error</option>
                    <option value="logic_error">Logic Error</option>
                </select>
                </div>
            </div>     
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-4 col-form-label col-form-label">Deskripsi</label>
              <div class="col-sm-7">
                <input type="text-area" class="form-control form-control-sm" id="deskripsi" placeholder=" " name="deskripsi">
              </div>
          </div> 
          <div class="form-group row">
            <label for="tgl_kejadian" class="col-sm-4 col-form-label col-form-label">Tanggal Kejadian</label>
            <div class="col-sm-7">
              <input type="date" class="form-control form-control-sm" id="tgl_kejadian" placeholder=" " name="tgl_kejadian">
            </div>
        </div>         
        <div class="form-group row">
          <label for="pelapor" class="col-sm-4 col-form-label col-form-label">pelapor</label>
          <div class="col-sm-7">
            <input type="text-area" class="form-control form-control-sm" id="pelapor" placeholder=" " name="pelapor">
          </div>
      </div>        
      <div class="form-group row">
        <label for="status" class="col-sm-4 col-form-label col-form-label">Status</label>
        <div class="col-sm-7">
          <select class="form-control" id="status" name="status">
            <option value="reported">Reported</option>
            <option value="on progress">On Progress</option>
            <option value="solved">Solved</option>
        </select>
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
        <form method="POST" action="{{ url('LaporanBug/import') }}" enctype="multipart/form-data">
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