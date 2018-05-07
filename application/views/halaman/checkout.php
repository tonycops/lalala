<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
</head>

<body style="padding:0px">
<?php $this->load->view("template/navbar"); ?>
    <section>
        <div class="container">
            <h3>Delayed Order</h3>
            <hr>
            <div class="row" style="background-color:#eef4f7;">
                <div class="col" data-aos="fade-left" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>No. Pembayaran :&nbsp;</strong></label><label class="col-form-label"><?php echo $id ?><br></label></div>
                <div class="col" data-aos="fade-left" data-aos-delay="100" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>Dibuat Pada :&nbsp;</strong></label><label class="col-form-label"><?php echo $date ?><br></label></div>
                <div class="col d-flex flex-row justify-content-end" data-aos="fade" data-aos-delay="200" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>Total :&nbsp;</strong></label><label class="col-form-label"><?php echo $total ?> <br></label></div>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="background-color:#eef4f7;padding:15px;">
                    <div class="d-flex flex-column align-items-center" data-aos="fade-up" data-aos-delay="250"><img src="<?php echo base_url('assets/img/b40.png')?>">
                        <h5 style="font-family:Lato, sans-serif;">Bank Central Asia<br></h5>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col" style="background-color:#eef4f7;">
                    <div>
                        <p class="text-center" data-aos="fade-up" data-aos-delay="400" style="color:rgb(0,0,0);font-family:Lato, sans-serif;">Rekening Bank :&nbsp;<strong style="font-weight:bold;">0331729972</strong>&nbsp;</p>
                        <p class="text-center" data-aos="fade-up" data-aos-delay="500" style="color:rgb(0,0,0);font-family:Lato, sans-serif;">Pemegang <strong>Akun</strong> :&nbsp;<strong style="font-weight:bold;">Eko Wicaksono Prasetyo</strong>&nbsp;</p>
                        <p class="text-center" data-aos="fade-up" data-aos-delay="600" style="color:rgb(0,0,0);font-family:Lato, sans-serif;">Situs Resmi Bank :&nbsp;&nbsp;<a class="text-primary" href="http://www.klikbca.com/" target="_blank">http://www.klikbca.com/<br></a></p>
                    </div>
                </div>
            </div>
            <hr>
            <p data-aos="fade-right" data-aos-delay="700">Payment Order will expire in&nbsp;<strong>3 days</strong>. Please complete it before&nbsp;<strong>2018-04-04 14:10:11</strong>.&nbsp;<br></p>
            <hr>
            <form action="<?php echo site_url()?>/Route/upload" method="post">
            <div class="row">
                <div class="col d-flex flex-row justify-content-end"><button class="btn btn-success" type="submit">Upload Bukti Pembayaran</button></div>
            </div>
            <input type="hidden" name="total" value="<?php echo $total ?>">
            </form>
        </div>
    </section>
<?php $this->load->view("template/footer"); ?>
</body>

</html>
