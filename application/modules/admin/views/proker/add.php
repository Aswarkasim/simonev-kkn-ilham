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
                                            <label for="" class="pull-right">Nama Proker</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" required name="nama_proker" value="<?= isset($proker) ? $proker->nama_proker : set_value('nama_proker') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Biaya</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" required name="biaya" value="<?= isset($proker) ? $proker->biaya : set_value('biaya') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Sumber Biaya</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" required name="sumber_biaya" value="<?= isset($proker) ? $proker->sumber_biaya : set_value('sumber_biaya') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Kerja Sama</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" required name="kerja_sama" value="<?= isset($proker) ? $proker->kerja_sama : set_value('kerja_sama') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Penaggung Jawab</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" required name="pj" value="<?= isset($proker) ? $proker->pj : set_value('pj') ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Tujuan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required name="tujuan" id="editorTujuan" class="form-control"><?= isset($proker) ? $proker->tujuan : set_value('tujuan') ?></textarea>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-6">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Sasaran</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required name="sasaran" id="editorSasaran" class="form-control"><?= isset($proker) ? $proker->sasaran : set_value('sasaran') ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="" class="pull-right">Standar Keberhasilan</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea required name="standar_keberhasilan" id="editorStandar" class="form-control"><?= isset($proker) ? $proker->standar_keberhasilan : set_value('standar_keberhasilan') ?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">
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
    CKEDITOR.replace("editorTujuan");
    CKEDITOR.replace("editorStandar");
    CKEDITOR.replace("editorSasaran");
</script>