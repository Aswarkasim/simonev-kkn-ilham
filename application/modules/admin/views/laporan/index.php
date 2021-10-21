<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= $title; ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <p>
      <a href="<?= base_url($add) ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
    </p>

    <table class="table DataTable">
      <thead>
        <tr>
          <th width="40px">No</th>
          <th>Nama Mahasiswa</th>
          <th width="200px">TIndakan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($laporan as $row) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><a href="<?= base_url('admin/laporan/download/' . $row->id_laporan) ?>"><strong><?= '$row->nama_laporan;' ?></strong></a></td>
            <td>
              <a class="btn btn-success" href="<?= base_url('admin/laporan/edit/' . $row->id_laporan) ?>"><i class="fa fa-edit"></i> Edit</a>
              <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/laporan/delete/' . $row->id_laporan) ?>"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
</div>