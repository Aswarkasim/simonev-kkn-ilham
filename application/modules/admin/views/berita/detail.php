<div class="col-md-6">
  <!-- Box Comment -->
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <!-- <img class="img-circle" src="<?= base_url($berita->gambar) ?>" alt="User Image"> -->
        <a href="<?= base_url('admin/berita/terkini') ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>

        <?php
        $role = $this->session->userdata('role');
        // echo $role;
        if ($role == 'Profesi') {
        ?>
          <a href="<?= base_url('admin/berita') ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> List Berita</a>
          <div class="btn-group">
            <button type="button" class="btn <?= $berita->is_active == 1 ? 'btn-success' : 'btn-danger'; ?>"><i class="fa fa-power-off"></i> <?= $berita->is_active == 1 ? 'Aktif' : 'Non Aktif'; ?></button>
            <button type="button" class="btn <?= $berita->is_active == 1 ? 'btn-success' : 'btn-danger'; ?> dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= base_url('admin/berita/is_active/' . $berita->id_berita . '/1'); ?>">Aktif</a></li>
              <li><a href="<?= base_url('admin/berita/is_active/' . $berita->id_berita . '/0'); ?>">Non Aktif</a></li>
            </ul>
          </div>
        <?php } ?>

        <span>
          <h3><strong><?= $berita->judul_berita; ?></strong></h3>
        </span>
        <span>dipublikasikan pada - <?= $berita->date_created; ?></span>
      </div>
      <!-- /.user-block -->
      <div class="box-tools">
        <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
          <i class="fa fa-circle-o"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <img class="img-responsive pad" src="<?= base_url($berita->gambar) ?>" alt="Photo">

      <p><?= $berita->isi; ?></p>

    </div>
    <!-- /.box-body -->


    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
</div>