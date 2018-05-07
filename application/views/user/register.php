<!DOCTYPE html>
<html>

<?php $this->load->view("template/header"); ?>

<body>
    <div class="d-flex flex-column justify-content-center register-photo" style="height:100vh;">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(<?php echo base_url('assets/img/73552e2a213e8461f413ff7b7a0a38aa.png')?>);background-size:auto;background-position:center;"></div>
            <form style="max-width:400px;" action="<?php echo site_url(); ?>/users/register" method="post" accept-charset="utf-8">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="input" name="first_name" required="" placeholder="First Name"></div>
                <div class="form-group"><input class="form-control" type="input" name="last_name" required="" placeholder="Last Name"></div>
                <div class="form-group"><select class="form-control" name="gender"><optgroup label="Gender"><option value="male" selected="">Male</option><option value="female">Female</option></optgroup></select></div>
                <div class="form-group"><input class="form-control" type="password" required="" name="password" placeholder="Password"></div>
                <div class="form-group"><input class="form-control" type="password" required="" name="password-repeat" placeholder="Password (repeat)"></div>
                <?php
                    if ($this->session->flashdata('val_error')) {
                      echo "<p style='text-align:center;'>".$this->session->flashdata('val_error')."</p>";
                    }
                ?>
                <div class="form-group"><button class="btn btn-success btn-block" name="btn_register" type="submit">Sign Up</button></div>
                <a href="<?php echo site_url(); ?>/users/login" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
<?php $this->load->view("template/footer"); ?>
</body>

</html>
