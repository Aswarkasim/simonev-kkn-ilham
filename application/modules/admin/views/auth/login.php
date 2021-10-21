 <div class="login-box-body">
     <p class="login-box-msg">Silakan Login</p>

     <form action="<?= base_url('admin/auth') ?>" method="post">
         <?php
            echo validation_errors('<div class="text text-danger">', '</div>');
            if (isset($error)) {
                echo '<div class="text text-danger">';
                echo $error;
                echo '</div>';
            }
            ?>

         <div class="form-group has-feedback">
             <input type="text" name="email" class="form-control" placeholder="Email/NIM/NIP">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         </div>

         <div class="form-group has-feedback">
             <input type="password" name="password" class="form-control" placeholder="Password">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>

         <div class="form-group has-feedback">
             <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
             <br>
             <p class="text-center">Registrasi Mahasiswa? <a href="<?= base_url('admin/auth/register'); ?>">Klik disini</a></p>
         </div>


     </form>

 </div>