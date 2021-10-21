<button type="button" class="btn btn-warning btn-sx" data-toggle="modal" data-target="#modal-default">
  <i class="fa fa-exchange"></i> Pilih Lokasi
</button>

<form action="<?= base_url('admin/mahasiswa/submitLokasi') ?>" method="POST">
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Lokasi</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="uri_member" id="">
            <input type="hidden" name="id_user" value="<?= $row->id_user; ?>" id="">
            <label for="">Lokasi</label>
            <select name="id_lokasi" class="select2" required style="width: 100%;" id="">
              <option value="">--Lokasi--</option>
              <?php foreach ($list_lok as $l) { ?>
                <option value="<?= $l->id_lokasi; ?>" <?= $l->id_lokasi == $row->id_lokasi ? 'selected' : ''; ?>><?= $l->nama_lokasi; ?></option>
              <?php } ?>
            </select>
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
</form>