<?php
$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);


$this->load->model('master/Master_model', 'MM');
$angkatan = $this->MM->listGeneral('tbl_angkatan', 'DESC');
?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msga') ?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('msg_er') ?>"></div>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>W</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MY</b>FW</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <?= $this->session->userdata('nama_angkatan'); ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                    <?php foreach ($angkatan as $a) { ?>
                        <li><a href="<?= base_url('admin/dashboard/is_angkatan/' . $a->id_angkatan); ?>"><?= $a->nama_angkatan; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= $user->namalengkap ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <p>
                                <?= $user->namalengkap ?>
                                <small><?= $user->role ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?= base_url('admin/auth/logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>