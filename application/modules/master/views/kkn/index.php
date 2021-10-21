<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-12">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manajemen KKN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <p>
                    <!-- <a href="<?= base_url($tombol['add']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a> -->
                    <?php include('add.php') ?>
                </p>

                <table class="table DataTable">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Nama</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="targetData">
                        <?php $no = 1;
                        foreach ($kkn as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->nama_kkn ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalEdit<?= $row->id_kkn ?>">
                                        <i class="fa fa-edit"></i>Edit
                                    </button>

                                    <!-- <a href="<?= base_url($tombol['edit']) ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
                                    <a href="<?= base_url($tombol['delete'] . $row->id_kkn) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <?php include('edit.php')
                                ?>
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