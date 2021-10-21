<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><strong><?= $title ?></strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                        if (isset($error)) {
                            echo '<div class="alert alert-warning">';
                            echo $error;
                            echo '</div>';
                        }

                        if ($this->uri->segment(3) == 'add') {
                            echo form_open_multipart($add);
                        } else {
                            echo form_open_multipart($edit);
                        } ?>
                        <form action="" method="post">


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Nama Administrasi</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_administrasi" required value="<?= isset($administrasi) ? $administrasi->nama_administrasi : set_value('nama_administrasi') ?>" placeholder="Nama Administrasi" class="form-control">
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="pull-right">Dokumen</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input <?= $this->uri->segment(3) == 'add' ? 'required' : '' ?> type="file" name="dokumen" placeholder="Dokumen" class="form-control">
                                        <small>*Hanya menerima format pdf</small>
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
                        <?= form_close() ?>
                    </div>
                    <!-- <div class="col-md-6">

                    </div> -->
                </div>


            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>