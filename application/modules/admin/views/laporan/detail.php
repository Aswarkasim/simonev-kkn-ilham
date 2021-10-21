<div class="col-md-6">
  <!-- Box Comment -->
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <!-- <img class="img-circle" src="<?= base_url($berita->gambar) ?>" alt="User Image"> -->
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> List Berita</a>
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
      <!-- <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted">127 likes - 3 comments</span> -->
    </div>
    <!-- /.box-body -->


    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
</div>