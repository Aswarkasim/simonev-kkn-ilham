<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
  <div class="col-md-6">


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">List Logbook Mahasiswa</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <table class="table DataTable">
          <thead>
            <tr>
              <th width="40px">No</th>
              <th>Nama</th>
            </tr>
          </thead>
          <tbody id="targetData">
            <?php $no = 1;
            foreach ($mahasiswa as $row) {
            ?>
              <tr>
                <td><?= $no ?></td>
                <td><a href=""><strong><?= $row->namalengkap ?></strong></a></td>

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