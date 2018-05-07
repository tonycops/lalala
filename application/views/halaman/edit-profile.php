<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>

</head>

<body style="padding:0px">
<?php $this->load->view("template/navbar"); ?>
    <div class="container profile profile-view" id="profile" style="background-color:#eef4f7;padding-top:0px;">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info absolue center" role="alert"><span>Profile save with success</span></div>
            </div>
        </div>
        <form action="<?php echo site_url()?>/Users/edit_profile/<?php echo $profile->id ?>" method="POST">
            <div class="form-row profile-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center"></div>
                    </div><input type="file" class="form-control" name="avatar-file"></div>
                <div class="col-md-8">
                    <h1 data-aos="fade" style="font-family:Lato, sans-serif;">Edit Profile </h1>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6" data-aos="fade-left" data-aos-delay="50">
                            <div class="form-group"><label>Firstname </label><input class="form-control" type="text" value="<?php echo $profile->first_name ?>" disabled="" name="firstname"></div>
                        </div>
                        <div class="col-sm-12 col-md-6" data-aos="fade-left" data-aos-delay="100">
                            <div class="form-group"><label>Lastname </label><input class="form-control" type="text" value="<?php echo $profile->last_name ?>" disabled="" name="lastname"></div>
                        </div>
                    </div>
                    <div class="form-group" data-aos="fade-left" data-aos-delay="150"><label>Email </label><input class="form-control" type="email" value="<?php echo $profile->email ?>" required="" autocomplete="off" name="email"></div>
                    <div class="form-group" data-aos="fade-left" data-aos-delay="200"><label>Handphone</label><input class="form-control" type="input" value="<?php echo $profile->no_hp ?>" required="" inputmode="numeric" autocomplete="off" name="email"></div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6" data-aos="fade-left" data-aos-delay="250">
                            <div class="form-group"><label>Birthdate</label>
                                <div class="form-row">
                                    <div class="col-sm-12 flex-row"><select class="form-control display-inline-block"><optgroup label="Date"><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option></optgroup></select><select class="form-control display-inline-block"
                                            style="margin-left:5px;margin-right:5px;"><optgroup label="Month"><option value="january" selected="">January</option><option value="february">February</option><option value="march">March</option></optgroup></select>
                                        <select
                                            class="form-control display-inline-block">
                                            <optgroup label="Year">
                                                <option value="1995" selected="">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                            </optgroup>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6" data-aos="fade-left" data-aos-delay="300">
                            <div class="form-group"><label>Gender</label><select class="form-control"><optgroup label="Gender"><option value="Male" selected="">Male</option><option value="Female">Female</option></optgroup></select></div>
                        </div>
                    </div>
                    <div class="form-group" data-aos="fade-left" data-aos-delay="350"><label>Address</label><textarea class="form-control" required=""><?php echo $profile->alamat ?></textarea></div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6" data-aos="fade" data-aos-delay="400">
                            <div class="form-group"><label>City</label><select class="form-control"><optgroup label="City"><option value="Surabaya" selected=""><?php echo $profile->kota ?></option><option value="Jakarta">Jakarta</option></optgroup></select></div>
                        </div>
                        <div class="col-sm-12 col-md-6" data-aos="fade-left" data-aos-delay="450">
                            <div class="form-group"><label>Kecamatan</label><select class="form-control"><optgroup label="Kecamatan"><option value="Gubeng" selected="">Gubeng</option><option value="Pucang Anom">Pucang Anom</option></optgroup></select></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6" data-aos="fade-left" data-aos-delay="500">
                            <div class="form-group"><label>Province</label><select class="form-control"><optgroup label="Province"><option value="East Java" selected="">East Java</option><option value="West Java">West Java</option></optgroup></select></div>
                        </div>
                        <div class="col-sm-12 col-md-6" data-aos="fade-left" data-aos-delay="550">
                            <div class="form-group"><label>Postal Code</label><input class="form-control" value="<?php echo $profile->kode_pos ?>" type="text" required="" name="firstname"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12" data-aos="fade-left" data-aos-delay="600">
                            <div class="form-group"><label>Password </label><input class="form-control" type="password" required="" name="password" autocomplete="off"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 content-right">
                        <button class="btn btn-primary form-btn" type="submit">SAVE </button>
                        <a href="<?php echo site_url()?>/Route/profile" class="btn btn-danger form-btn" type="reset">CANCEL </a></div>
                    </div>
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