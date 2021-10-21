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
        Selamat datang <?= $user->namalengkap ?> di aplikasi SIstem Infromasi dan Evaluasi KKN
      </p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= count($administrasi) ?></h3>

        <p>Format Administrasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?= base_url('master/barang') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= count($proker) ?></h3>

        <p>Proker</p>
      </div>
      <div class="icon">
        <i class="fa fa-adjust"></i>
      </div>
      <a href="<?= base_url('transaksi/masuk') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= count($personil) ?></h3>

        <p>Jumlah Personel</p>
      </div>
      <div class="icon">
        <i class="fa fa-users "></i>
      </div>
      <a href="<?= base_url('transaksi/keluar') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $this->session->userdata('nama_angkatan'); ?></h3>

        <p>Angkatan</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="<?= base_url('admin/user') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <!-- Begin Page Content -->
  <div class="row">
    <div class="col-lg-12">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
                <p class="alert alert-success"><?= isset($lokasi) ? 'Anda ditempatkan di ' . $lokasi->nama_lokasi : 'Tempat belum diumumkan'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->