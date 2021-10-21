<div class="row">
  <div class="col-md-6">



    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><b>Berikan Nilai Lokasi KKN</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <button type="button" class="btn btn-warning btn-sx" data-toggle="modal" data-target="#modal-default">
          <i class="fa fa-plus"></i> Ubah
        </button>
        <?= form_open('admin/penilaian/inputNilai/' . $penilaian->id_penilaian) ?>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nilai Lokasi</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">

                  <div class="row">
                    <div class="col-md-3">
                      <label for="" class="pull-right">Nilai</label>
                    </div>
                    <div class="col-md-9">
                      <select name="nilai" id="" class="select2" style="width: 200px;">
                        <option value="">--- Masukkan Nilai ---</option>
                        <?php for ($i = 0; $i <= 100; $i++) { ?>
                          <option value="<?= $i; ?>" <?= $i == $penilaian->nilai ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <label for="" class="pull-right">Deskripsi</label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"><?= $penilaian->deskripsi; ?></textarea>
                    </div>
                  </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?= form_close() ?>
        <!-- /.modal -->

        <h4><strong>Nama Lokasi : <?= $penilaian->nama_lokasi; ?></strong></h4>
        <h4><strong>Nilai : <?= $penilaian->nilai; ?></strong></h4>
        <h4><strong>Keterangan :</strong></h4>

        <p><?= $penilaian->deskripsi; ?></p>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
</div>