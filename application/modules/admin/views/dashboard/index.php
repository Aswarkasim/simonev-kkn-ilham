<!-- Begin Page Content -->
<div class="row">
    <div class="col-lg-12">
        <i class="fa fa-home fa-3x">Beranda</i><br>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success">
            <p>
                <i class="fa fa-user"></i>
                Selamat datang <?= $user->namalengkap ?>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= count($saran) ?></h3>

                <p>Saran</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('master/saran') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= count($lokasi) ?></h3>

                <p>Lokasi</p>
            </div>
            <div class="icon">
                <i class="fa fa-map-marker"></i>
            </div>
            <a href="<?= base_url('transaksi/lokasi') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= count($prodi) ?></h3>

                <p>Lokasi</p>
            </div>
            <div class="icon">
                <i class="fa fa-building"></i>
            </div>
            <a href="<?= base_url('transaksi/prodi') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= count($angkatan) ?></h3>

                <p>KKN</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('admin/user') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->



</div>
<!-- /.container-fluid -->