<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Penilaian</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <p>
            <!-- <a href="<?= base_url($add) ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a> -->
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama Penilai</th>
                    <th>Dinilai</th>
                    <th>Nilai</th>
                    <!-- <th width="200px">Tindakan</th> -->
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($penilaian as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <strong><?= $row->namalengkap ?></strong>
                        </td>
                        <td><?= $row->nama_lokasi ?></td>
                        <td><?= $row->nilai ?></td>
                        <!-- <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url($edit . $row->id_penilaian)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url($delete . $row->id_penilaian)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td> -->
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>