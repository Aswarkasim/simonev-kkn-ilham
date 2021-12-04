<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<style>
  .card {
    border: 1px solid #f0f0f0;
    margin: 10px;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><strong><?= $title ?></strong></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <div class="row">
          <?php foreach ($berita as $row) { ?>
            <div class="col-md-3 card">
              <img src="<?= base_url($row->gambar); ?>" width="100%" class="mr-3" alt="...">
              <div class="media-body">
                <h5 class="mt-0 mb-1"><a href="<?= base_url('admin/berita/detail/' . $row->id_berita); ?>"><strong><?= $row->judul_berita; ?></strong></a></h5>
                <p><?= character_limiter($row->isi, '100') ?></p>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

<script>
  CKEDITOR.replace('editor1')
  $('.select2').select2()
</script>