<div class="modal fade" id="ModalEdit<?= $row->id_angkatan ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah KKN</h4>
            </div>
            <?= form_open(base_url($tombol['edit'] . '/' . $row->id_angkatan)) ?>
            <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Nama Kategori</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_angkatan" required value="<?= $row->nama_angkatan ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->