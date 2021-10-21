<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url($add) ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Lokasi Awal</th>
                    <th>Lokasi Tujuan</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($pengajuan as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->namalengkap; ?></td>
                        <td><?= $row->nama_lokasi_awal; ?></td>
                        <td><?= $row->nama_lokasi_tujuan; ?></td>
                        <th></th>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>