<div class="row">
  <div class="col-md-6">


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Download Administrasi</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php foreach ($adm as $row) { ?>
          <a href="<?= base_url('admin/administrasi/download/' . $row->id_administrasi); ?>"><strong><?= $row->nama_administrasi; ?></strong></a>
        <?php } ?>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>