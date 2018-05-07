<!DOCTYPE html>
<html>

<?php $this->load->view("template/header"); ?>

  <body>
    <div class="d-flex flex-column justify-content-center login-clean" style="height:100vh;">
        <form style="max-width:400px;" action="<?php echo site_url(); ?>/users/login" method="post" accept-charset="utf-8">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img class="img-fluid" src="<?php echo base_url('/assets/img/1ec2e2bb8f834a6d5e26834d99c4ac2b.jpg')?>" style="width:250px;"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
            <?php
                if ($this->session->flashdata('login_failed')) {
                  echo "<p style='text-align:center;'>".$this->session->flashdata('login_failed')."</p>";
                }
            ?>
            <?php
                if ($this->session->flashdata('val_error')) {
                  echo "<p style='text-align:center;'>".$this->session->flashdata('val_error')."</p>";
                }
            ?>
            <?php
                if ($this->session->flashdata('user_registered')) {
                  echo "<p style='text-align:center;'>".$this->session->flashdata('user_registered')."</p>";
                }
            ?>
            <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="btn_login">Log In</button></div>
            <a href="#" class="forgot">Forgot your email or password?</a>
            <div class="col d-flex justify-content-center" style="margin-top:10px;">
              <a class="d-flex forgot" href="<?php echo site_url(); ?>/users/register" style="font-size:12px;text-align:center;">You don't have an account? Register here.</a>
            </div>
        </form>
    </div>
    <?php $this->load->view("template/footer"); ?>
  </body>

  </html>
