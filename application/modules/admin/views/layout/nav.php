<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "dashboard") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/dashboard')
                                        ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <?php if ($role == 'Admin' || ($role == 'LP2M')) { ?>
                <li class="treeview <?php if ($this->uri->segment(2) == "mahasiswa") {
                                        echo "active";
                                    } ?>">
                    <a href="#"><i class="fa fa-graduation-cap"></i> <span>Mahasiswa</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->segment(3) == "index") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/mahasiswa/index') ?>">Pembagian Lokasi</a></li>

                        <li class="<?php if ($this->uri->segment(3) == "pengelompokan") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/mahasiswa/pengelompokan') ?>">Pengelompokan</a></li>
                    </ul>
                </li>
            <?php } ?>


            <?php if ($role != 'Profesi') { ?>

                <li class="<?php if ($this->uri->segment(2) == "proker") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/proker')
                                            ?>"><i class="fa fa-adjust"></i> <span>Proker</span></a></li>

                <li class="<?php if ($this->uri->segment(2) == "logbook") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/logbook')
                                            ?>"><i class="fa fa-list"></i> <span>Logbook</span></a></li>

                <li class="<?php if ($this->uri->segment(2) == "laporan") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/laporan')
                                            ?>"><i class="fa fa-book"></i> <span>Laporan</span></a></li>

                <li class="<?php if ($this->uri->segment(2) == "pengajuan") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/pengajuan')
                                            ?>"><i class="fa fa-inbox"></i> <span>Pengajuan</span></a></li>
            <?php } ?>

            <li class="treeview <?php if ($this->uri->segment(2) == "berita") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-object-group"></i> <span>Berita</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="<?php if ($this->uri->segment(3) == "add") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/berita/add') ?>"><?= $role == 'Mahasiswa' ? 'Usulkan Berita' : 'Tambah Berita'; ?></a></li>
                    <?php if (($role == 'Admin') || $role == 'Profesi') { ?>
                        <li class="<?php if ($this->uri->segment(3) == "index") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/berita/index') ?>">List Berita</a></li>
                    <?php } ?>
                </ul>
            </li>


            <li class="treeview <?php if ($this->uri->segment(2) == "download") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-download"></i> <span>Unduh</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if (($role == 'Admin') || $role == 'LP2M') { ?>
                        <li class="<?php if ($this->uri->segment(2) == "administrasi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/administrasi') ?>">List Unduh</a></li>
                    <?php } ?>

                    <li class="<?php if ($this->uri->segment(2) == "downloadPage") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/administrasi/downloadPage') ?>">Download</a></li>
                </ul>
            </li>

            <?php if ($role != 'Profesi') { ?>
                <li class="treeview <?php if ($this->uri->segment(2) == "penilaian") {
                                        echo "active";
                                    } ?>">
                    <a href="#"><i class="fa fa-table"></i> <span>Penliaian</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->segment(4) == "Lokasi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/penilaian/index/Lokasi') ?>">Lokasi KKN</a></li>

                        <li class="<?php if ($this->uri->segment(4) == "DPL") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/penilaian/index/DPL') ?>">DPL</a></li>
                    </ul>
                </li>
            <?php } ?>


            <?php if ($role == 'Admin') { ?>
                <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                        echo "active";
                                    } ?>">
                    <a href="#"><i class="fa fa-user"></i> <span>Manajemen User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->segment(4) == "LP2M") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/user/index/LP2M') ?>">LP2M</a></li>

                        <li class="<?php if ($this->uri->segment(4) == "Profesi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/user/index/Profesi') ?>">Profesi</a></li>

                        <li class="<?php if ($this->uri->segment(4) == "Admin") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/user/index/Admin') ?>">Admin</a></li>
                    </ul>
                </li>

                <li class="treeview <?php if ($this->uri->segment(1) == "master") {
                                        echo "active";
                                    } ?>">
                    <a href="#"><i class="fa fa-folder"></i> <span>Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($this->uri->segment(2) == "prodi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/prodi') ?>">Prodi</a></li>

                        <li class="<?php if ($this->uri->segment(2) == "kkn") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/kkn') ?>">KKN</a></li>

                        <li class="<?php if ($this->uri->segment(2) == "angkatan") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/angkatan') ?>">Angkatan</a></li>

                        <li class="<?php if ($this->uri->segment(2) == "lokasi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/lokasi') ?>">Lokasi KKN</a></li>

                        <li class="<?php if ($this->uri->segment(2) == "user") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('master/user') ?>">DPL</a></li>
                    </ul>
                </li>

                <li class="<?php if ($this->uri->segment(2) == "saran") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/saran')
                                            ?>"><i class="fa fa-envelope"></i> <span>Saran</span></a></li>



                <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/konfigurasi')
                                            ?>"><i class="fa fa-cogs"></i> <span>Konfigurasi</span></a></li>
            <?php } ?>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">