<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("template/header"); ?>
</head>

<body style="padding:0;">
    <?php $this->load->view("template/navbar"); ?>
    <div class="container profile profile-view" id="profile" style="background-color:#eef4f7;">
            <div class="form-row profile-row" style="margin-top:10px;">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center" style="background-image:url(&quot; &quot;);"><img class="img-fluid" src="<?php echo base_url()?>/assets/img/73552e2a213e8461f413ff7b7a0a38aa.png"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1 data-aos="fade" style="font-family:Lato, sans-serif;">Profile&nbsp;<small><?php echo $profile->first_name." ". $profile->last_name?></small> </h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>First Name</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->first_name?></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><strong>Last Name</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->last_name?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>Gender</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->gender?></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><strong>Handphone</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->no_hp?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>Birthdate</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->tgl_lahir?></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><strong>Email</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><?php echo $profile->email?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>Address</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-9" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-nowrap"><?php echo $profile->alamat?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>City</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->kota?></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><strong>Kecamatan</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->kecamatan?></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p><strong>Province</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->provinsi?></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="50">
                            <p><strong>Postal Code</strong></p>
                        </div>
                        <div class="col-sm-12 col-md-3" data-aos="fade-left" data-aos-delay="100">
                            <p class="text-truncate"><?php echo $profile->kode_pos?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                    <form action="<?php echo site_url()?>/Route/edit_profile" >
                        <div class="col-md-12 content-right">
                        
                            <button class="btn btn-success form-btn" type="submit" >Update Profile</button>
                        </form>
                            <button class="btn btn-info form-btn" type="submit">Subscribe</button>
                            <button class="btn btn-danger form-btn" type="submit">Unsubscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
        <h1 class="text-center" data-aos="fade" data-aos-delay="100">Transaction History</h1>
        <hr>
        <form>
            <div class="form-row profile-row" style="margin-top:10px;">
                <div class="col" data-aos="fade" data-aos-delay="250" style="background-color:#f8f9fa;padding:5px;"><div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Search">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>No</th>
      <th>Transaction ID</th>
      <th>Total</th>
      <th>Time</th>
      <th>Date</th>
      <th>Status</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="5"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>aaaaaa<button class="btn btn-sm btn-outline-primary form-btn" type="submit">Details</button></td>
      <td>12.000</td>
      <td>12.00pm</td>
      <td>17/05/2018</td>
      <td><i class="fa fa-minus" style="color:#ffc61e;"> Pending</i></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>aaaaa</td>
      <td>10.000</td>
      <td>12.00pm</td>
      <td>17/05/2018</td>
      <td><i class="fa fa-check" style="color:#00c993;"> Done </i><button class="btn btn-sm btn-outline-success form-btn" type="submit">Rate</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>aaaaa</td>
      <td>10.000</td>
      <td>12.00pm</td>
      <td>17/05/2018</td>
      <td><i class="fa fa-close" style="color:#eb3b60;"> Cancelled</i></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>aaaaa</td>
      <td>10.000</td>
      <td>12.00pm</td>
      <td>17/05/2018</td>
        <td><i class="fa fa-clock-o" style="color:#00c993;"> Delivered</i></td>
    </tr>
  </tbody>
</table>
</div>
            </div>
        </form>
    </div>
    <script src="<?php echo base_url()?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <!-- <script src="<?php echo base_url()?>/assets/js/Profile-Edit-Form.js"></script> -->
    <script src="<?php echo base_url()?>/assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo base_url()?>/assets/js/Sidebar-Menu.js"></script>
    <script src="https://smtpjs.com/v2/smtp.js"></script>
    <script src="<?php echo base_url()?>/assets/js/Table-with-search.js"></script>
    <script src="<?php echo base_url()?>/assets/js/zoom.js"></script>
</body>

</html>