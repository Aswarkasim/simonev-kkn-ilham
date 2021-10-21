<div class="row">
    <div class="col-md-6">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pengajuan Pemindahan Lokasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (isset($pengajuan)) {
                    if ($pengajuan->status == 'Menunggu') {
                ?>
                        <p class="alert alert-warning"><?= $pengajuan->status; ?></p>
                    <?php } else if ($pengajuan->status == "Diterima") { ?>
                        <a href="<?= base_url('admin/pengajuan/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Ajukan pemindahan</a>
                        <br><br>
                        <p class="alert alert-success"><?= $pengajuan->status; ?></p>
                    <?php } else { ?>
                        <a href="<?= base_url('admin/pengajuan/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Ajukan pemindahan</a>
                        <br><br>
                        <p class="alert alert-danger"><?= $pengajuan->status; ?></p>
                <?php }
                }
                ?>
            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>