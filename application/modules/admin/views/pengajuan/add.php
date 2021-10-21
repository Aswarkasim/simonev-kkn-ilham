<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">



                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <?php $id_lokasi = $this->session->userdata('id_lokasi');
                if ($this->uri->segment('3') == 'edit') { ?>
                    <form action="<?= base_url($edit) ?>" method="post">
                    <?php } else { ?>
                        <form action="<?= base_url($add) ?>" method="post">

                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Lokasi Tujuan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="id_lokasi_tujuan" class="form-control select2" required id="">
                                                <option value="">---Lokasi Tujuan---</option>
                                                <?php foreach ($lokasi as $row) { ?>
                                                    <option value="<?= $row->id_lokasi; ?>" <?= $id_lokasi == $row->id_lokasi ? 'selected' : ''; ?>><?= $row->nama_lokasi; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Aktivitas</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required name="alasan" id="editorAktivitas" class="form-control"><?= isset($logbook) ? $logbook->alasan : set_value('alasan') ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>



                        </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>



<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editorAktivitas");
</script>