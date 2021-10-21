 <div class="login-box-body">
     <p class="login-box-msg">Silakan Login</p>

     <form action="<?= base_url('admin/auth/register') ?>" method="post">
         <?php
            if (isset($error)) {
                echo '<div class="text text-danger">';
                echo $error;
                echo '</div>';
            }
            ?>

         <div class="form-group has-feedback">
             <select name="role" id="" required class="form-control">
                 <option value="">-- Pengguna --</option>
                 <option value="mahasiswa">Mahasiswa</option>
                 <option value="dpl">DPL</option>
             </select>
         </div>

         <div class="form-group has-feedback">
             <input type="text" name="id_user" required class="form-control" placeholder="NIM/NIP">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             <?= form_error('id_user') ?>

         </div>

         <div class="form-group has-feedback">
             <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             <?= form_error('namalengkap') ?>
         </div>

         <div class="form-group has-feedback">
             <select name="id_prodi" id="" required class="form-control">
                 <option value="">-- Prodi --</option>
                 <?php foreach ($prodi as $row) { ?>
                     <option value="<?= $row->id_prodi; ?>"><?= $row->nama_prodi; ?></option>
                 <?php } ?>
             </select>
         </div>

         <!-- <div class="form-group has-feedback">
             <input type="email" name="email" class="form-control" placeholder="Email">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         </div> -->

         <div class="form-group has-feedback">
             <input type="password" name="password" class="form-control" placeholder="Password">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
             <?= form_error('password') ?>
         </div>

         <div class="form-group has-feedback">
             <input type="password" name="re_password" class="form-control" placeholder="Konfirmasi Password">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
             <?= form_error('re_password') ?>
         </div>

         <div class="form-group has-feedback">
             <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
             <br>
             <p class="text-center">Sudah punya akun ? <a href="<?= base_url('admin/auth'); ?>">Silakan login</a></p>
         </div>


     </form>

 </div>