<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Laporan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <?php if ($laporan == null) { ?>
      <p>
        <a href="<?= base_url($add) ?>" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Upload Laporan</a>
      <p class="alert alert-danger"><i class="fa fa-times"></i> Laporan belum diupload</p>
      </p>
    <?php } else { ?>
      <p class="alert alert-success"><i class="fa fa-check"></i> Laporan telah diupload</p>
      <a href="<?= base_url('admin/laporan/delete/' . $laporan->id_laporan); ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-times"></i> Hapus dan upload ulang</a>
    <?php } ?>

  </div>
  <!-- /.box-body -->
</div>