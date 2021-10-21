<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
  <div class="col-md-6">


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pengelompokan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">


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
            foreach ($lokasi as $row) { ?>
              <tr>
                <td><?= $no ?></td>
                <td><a href="<?= base_url('admin/mahasiswa/member/' . $row->id_lokasi); ?>"><strong><?= $row->nama_lokasi ?></strong></a></td>
                <td>
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalEdit<?= $row->id_lokasi ?>">
                    <i class="fa fa-edit"></i>Edit
                  </button>


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