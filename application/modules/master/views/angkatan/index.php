<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-12">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manajemen Angkatan</h3>
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
                            <th>Status</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="targetData">
                        <?php $no = 1;
                        foreach ($angkatan as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->nama_angkatan ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn <?= $row->is_active == 1 ? 'btn-success' : 'btn-danger'; ?>"><?= $row->is_active == 1 ? 'Aktif' : 'Tidak aktif'; ?></button>
                                        <button type="button" class="btn <?= $row->is_active == 1 ? 'btn-success' : 'btn-danger'; ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= base_url('master/angkatan/is_active/' . $row->id_angkatan); ?>">Aktif</a></li>
                                            <li><a href="<?= base_url('master/angkatan/is_active/' . $row->id_angkatan); ?>">Non Aktif</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalEdit<?= $row->id_angkatan ?>">
                                        <i class="fa fa-edit"></i>Edit
                                    </button>

                                    <!-- <a href="<?= base_url($tombol['edit']) ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
                                    <a href="<?= base_url($tombol['delete'] . $row->id_angkatan) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
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