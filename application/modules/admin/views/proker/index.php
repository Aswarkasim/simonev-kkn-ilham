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
                    <th>Nama</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($proker as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <a href="<?= base_url('admin/proker/detail/' . $row->id_proker); ?>"><strong><?= $row->nama_proker ?></strong></a><br>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url($edit . $row->id_proker)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url($delete . $row->id_proker)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>



<!-- <script>
    prokerData();

    function prokerData() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "admin/proker/prokerData" ?>',
            dataType: 'json',
            success: function(data) {
                var baris = '';

                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td><img width="50px" src="<?= base_url('assets/uploads/images/') ?>' + data[i].image + '" alt=""></td>' +
                        '<td>' +
                        '<strong>' + data[i].nama_proker + '</strong><br>' +
                        '<p>' + data[i].email + ' - ' + data[i].role + '</p>' +
                        '</td>' +
                        '<td><a href="<?php
                                        ?>/' + data[i].id_proker + '" class="btn btn-sm btn-primary"><i class="fas fa fa-edit"></i> Edit</a></td>' +
                        '</tr>';
                }

                $('#targetData').html(baris);
            }
        })
    }
</script> -->