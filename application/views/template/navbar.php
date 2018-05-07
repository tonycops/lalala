<nav class="navbar navbar-light navbar-expand-md sticky-top" style="font-family:Lato, sans-serif;background-color:#64bea8;height:55px;">
    <div class="container-fluid"><a class="navbar-brand" href="<?php echo site_url(); ?>/Route/home" target="_parent" data-bs-hover-animate="pulse"><img src="<?php echo base_url()?>/assets/img/logo_kura.png"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
            class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo site_url(); ?>/Route/product">Product</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo site_url(); ?>/...">Article</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo site_url(); ?>/...">Story</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo site_url(); ?>/...">Contact Us</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo site_url(); ?>/Route/profile">Profile</a></li>
            </ul>
            <?php if(!$this->session->userdata('loggedUser')) : ?>
              <span class="navbar-text">
                <a href="<?php echo site_url(); ?>/users/register" class="login" style="padding-right:16px;">Sign Up</a>
                <a class="btn btn-light action-button" role="button" href="<?php echo site_url(); ?>/Route/login">Login</a></span>
            <?php endif; ?>
            <?php if($this->session->userdata('loggedUser')) : ?>
              <span class="navbar-text">
                <a href="#" class="login" style="padding-right:16px;">Halo, <?php echo $this->session->userdata("loggedUser")[0]->first_name; ?></a>
                <a class="btn btn-light action-button" role="button" href="<?php echo site_url(); ?>/users/logout">Logout</a></span>
            <?php endif; ?>
          </div>
    </div>
</nav>
