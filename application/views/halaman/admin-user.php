<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("template/header"); ?>
</head>

<body style="padding:0;">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="d-flex align-items-center sidebar-brand"> <a href="#">Welcome, Admin!</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin">Notifications<span class="text-white"><i class="fa fa-bell-o"></i></span></a></li>
                <li> <a href="#">User</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_product">Product</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_article">Article</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_story">Story</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_pembelian">Pembelian</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_chart">Laporan</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>User &nbsp;</h1>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div><table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Handphone</th>
                <!-- <th>Birthdate</th> -->
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>Kecamatan</th>
                <th>Province</th>
                <th>Postal Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>       
            <?php foreach($user as $u) : ?>
            <form method="post">
                <tr>
                    <td><label><?php echo $u['id'] ?></label></td>
                    <td><label><?php echo $u['first_name'] ?></label></td>
                    <td><label><?php echo $u['last_name'] ?></label></td>
                    <td><label><?php echo $u['email'] ?></label></td>
                    <td><label><?php echo $u['no_hp'] ?></label></td>
                    <!-- <td><label><?php echo $u['tgl_lahir'] ?></label></td> -->
                    <td><label><?php echo $u['gender'] ?></label></td>
                    <td><label><?php echo $u['alamat'] ?></label></td>
                    <td><label><?php echo $u['kota'] ?></label></td>
                    <td><label><?php echo $u['kecamatan'] ?></label></td>
                    <td><label><?php echo $u['provinsi'] ?></label></td>  
                    <td><label><?php echo $u['kode_pos'] ?></label></td>    
                    <td><button class="btn btn-outline-primary" style="margin-right:5px;" type="submit"><i class="fa fa-pencil-square-o"></i>Edit</button><button class="btn btn-outline-danger" type="button">Delete<i class="icon ion-android-delete float-left"></i></button></td>
                </tr>     
            </form>
            <?php endforeach?>
        </tbody>
    </table></div>
    <?php $this->load->view("template/footer"); ?>
</body>

</html>