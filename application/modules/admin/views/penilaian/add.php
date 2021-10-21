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

                <?php if ($this->uri->segment('3') == 'edit') { ?>
                    <form action="<?= base_url($edit) ?>" method="post">
                    <?php } else { ?>
                        <form action="<?= base_url($add) ?>" method="post">

                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Tanggal</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="date" required name="tanggal" value="<?= isset($logbook) ? $logbook->tanggal : set_value('tanggal') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Jam Mulai</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="time" required name="waktu_dari" value="<?= isset($logbook) ? $logbook->waktu_dari : set_value('waktu_dari') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Sampai Jam</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="time" required name="waktu_sampai" value="<?= isset($logbook) ? $logbook->waktu_sampai : set_value('waktu_sampai') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Aktivitas</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required name="aktivitas" id="editorAktivitas" class="form-control"><?= isset($logbook) ? $logbook->aktivitas : set_value('aktivitas') ?></textarea>
                                        </div>
                                    </div>
                                </div>



                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-9">
                                    <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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