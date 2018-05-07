<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("template/header"); ?>
</head>

<body style="font-family:Lato, sans-serif;padding:0px;">
    <?php $this->load->view("template/navbar_product"); ?>
    <section style="min-height:80vh;">
        <div id="wrapper">
        <?php $this->load->view("template/menu-left"); ?>
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="search-container" style="margin-top:0px;"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a></div>
                    <div class="row">
                    <form action="<?php echo site_url()?>/Cont_trans/checkout" method="POST" >
                        <div class="col-md-12">
                            <div>
                                <h1>Shopping Cart</h1>
                            </div>
                            <p class="float-left" style="padding-top:4px;">Total :&nbsp;</p>
                            <input class="form-control-sm" type="text" name="total" readonly value="Rp <?php echo $total ?>,-"  style="margin-right:5px;width:120px;">
                            <button  class="btn btn-outline-success btn-sm"
                                type="submit" style="margin-left:5px;">Check Out</button></div>     
                        </div>
                    </form>
                </div>
                        <div class="">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="tabel-head" style="width:30%;">Nama Barang</th>
                                        <th class="tabel-head" style="width:10%;">Foto</th>
                                        <th class="tabel-head" style="width:15%;">Jumlah</th>
                                        <th class="tabel-head" style="width:10%;">Harga</th>
                                        <th class="tabel-head" style="width:10%;">Subtotal</th>
                                        <th style="width:10%;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($shopping_cart as $s ) : ?>
                                <form method="post" action="<?php echo site_url()?>/Cont_trans/updateCart">
                                    <tr>
                                        <td class="tabel-body"><?php echo $s['name'] ?></td>
                                        <td class="justify-content-center align-items-center align-content-center tabel-body"><img src="<?php echo base_url() ?>/assets/img/<?php echo $s['options']['gambar']?>" style="width:80px;height:80px;"></td>
                                        <td class="tabel-body"><input class="float-left" type="number" name="qty" value="<?php echo $s['qty'] ?>" min="1" style="margin-right:4px;width:50px;"><input class="btn btn-outline-primary btn-sm float-left" name="update" type="submit" value="Update"></td>
                                        <td class="tabel-body"><?php echo number_format($s['price'],0,".",".") ?></td>
                                        <td class="tabel-body"><?php echo number_format($s['subtotal'],0,".",".") ?></td>
                                        <td><button class="btn btn-outline-danger" type="submit"><i class="fa fa-times"></i>Cancel</button></td>
                                    </tr>
                                    <input type="hidden" value="<?php echo $s['rowid']?>" name="rowid">
                                    </form>
                                <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total :</td>
                                        <td style="border:1px solid #dee2e6;"> <?php echo number_format($total,0,".",".") ?>,-</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
            </div>
        </div>
    </section>
    <div class="footer-clean" style="background-color:#cccccc;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 col-xl-3 offset-md-3 offset-lg-3 offset-xl-3 item">
                        <h3>Kura-kuraku</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 offset-xl-0 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item" style="padding:auto;padding-right:0px;padding-left:0px;"><a class="d-flex justify-content-center" href="http://www.limabenua.com" target="_parent"><img class="img-fluid" src="<?php echo base_url()?>assets/img/12_20170727_08512234.gif"></a></div>
                    <div class="col-md-6 col-lg-3 col-xl-3 offset-md-6 offset-lg-2 offset-xl-3 d-flex justify-content-center align-items-center item social"
                        style="padding-top:10px;"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Kurakuraku© 2017</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <?php $this->load->view("template/footer"); ?>
</body>
</html>