<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= isset($add) ? base_url($add) : '' ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Aktiitas</th>
                    <?php if (isset($edit)) { ?>
                        <th width="200px">Tindakan</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($logbook as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <strong><?= $row->tanggal ?></strong>
                        </td>
                        <td><?= $row->waktu_dari . ' - ' . $row->waktu_sampai ?></td>
                        <td><?= $row->aktivitas; ?></td>
                        <?php if (isset($edit)) { ?>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url($edit . $row->id_logbook)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                        <li><a class="tombol-hapus" href="<?= base_url($delete . $row->id_logbook)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            <?php } ?>

                            </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>