<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-12">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manajemen Dokumentasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <p>
                    <?php include('add.php') ?>
                </p>

                <?php
                echo validation_errors('<span class="text text-danger">', '</span>');
                if (isset($error)) {
                    echo $error;
                } ?>

                <table class="table DataTable">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th width="200px">Gambar</th>
                            <th>Deskripsi</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="targetData">
                        <?php $no = 1;
                        foreach ($dokumentasi as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><img src="<?= base_url($row->gambar) ?>" alt="" width="100px"></td>
                                <td><?= $row->deskripsi ?></td>
                                <td>
                                    <!-- <button type="button" class="btn btn-success btn-xs" data-toggle="modal">
                                        <i class="fa fa-edit"></i>Edit
                                    </button> -->
                                    <a href="<?= base_url('admin/dokumentasi/edit/' . $row->id_dokumentasi) ?>" class="btn btn-success btn-xs">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <!-- <a href="<?= base_url() ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
                                    <a href="<?= base_url('admin/dokumentasi/delete/' . $row->id_dokumentasi) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>