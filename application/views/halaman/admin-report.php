<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
<style>

.h_trans{
    border : 0.25px solid grey;
    margin-top:0px;
    margin-bottom:0px;
    background-color:lightgrey;
    position:relative;
    cursor:pointer;
}
.id{
    margin:5px;
    position:absolute;
    top:0;
    left:40px;
}
.tanggal{
    margin:5px;
    position:absolute;
    top:0;
    right:40px;
}
.isi{
    margin:auto;
    width:80%;
    text-align:center;
    padding-top:24px;
    padding-bottom:24px;
}

.d_trans{
    border : 0.25px solid darkgrey;
    width:100%;
    margin:auto;
    margin-top:0px;
    margin-bottom:9px;
    background-color:rgb(240,240,240);
    position:relative;
    display:none;
}
.judul{
    text-align:center;
    margin-top:5px;
    margin-bottom:5px;
}
.isi_d{
    width:90%;
    margin:auto;
}

.pressed {
    text-align:center;
  background: rgb(235,235,235);
  -webkit-box-shadow: inset 2px 2px 2px #c1c1c1;
     -moz-box-shadow: inset 2px 2px 2px #c1c1c1;
          box-shadow: inset 2px 2px 2px #c1c1c1;
}

.divPemasukan{
    display:none;
}
</style>
</head>

<body style="padding:0">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="d-flex align-items-center sidebar-brand"> <a href="#">Welcome, Admin!</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin">Notifications<span class="text-white"><i class="fa fa-bell-o"></i></span></a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_user">User</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_product">Product</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_article">Article</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_story">Story</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_pembelian">Pembelian</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_chart">Laporan</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper divPengeluaran" id="printDiv" style="padding-top:24px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Laporan</h1>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div style="position:relative">
                            <div class="pressed" id="pengeluaran" style="cursor:pointer;left:0;;width:30%;float:left;text-align:center;">
                            <h3 >Pengeluaran</h3>
                            </div>
                            <div class="" id="pemasukan" style="cursor:pointer;right:0px;width:20%;float:right;top:0px;text-align:center;">
                            <h3>Pemasukan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="padding-top:12px">
            <?php foreach($h_trans_pembelian as $h) : ?>
                <div class="h_trans" id="<?php echo $h['id']?>">
                    <div class="id"><strong>ID - <?php echo $h['id']?></strong></div>
                    <div class="tanggal"><strong><?php echo date_format(date_create($h['tanggal']),'d-F-Y')?></strong></div>
                    <div class="isi"><?php echo $h['pemasok']; if(!$h['pemasok']) echo "Undefined"; ?><br>Rp. <?php echo number_format($h['total'],3,'.','.')?></div>
                </div>
                <div class="d_trans " id="d<?php echo $h['id']?>">
                    <div class="judul">Details</div>
                    <div class="isi_d">
                    <table class="table table-bordered" cellspacing="0" width="100%" style="border:2px solid black">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub-total</th>
                        </tr>
                        <?php foreach($d_trans_pembelian as $d) : 
                            if($d['id'] == $h['id']) :?>
                        <tr>
                            <td><?php echo $d['id_product']?></td>
                            <td><?php echo $d['nama_product']?></td>
                            <td><?php echo $d['jumlah']?></td>
                            <td><?php echo $d['harga']?></td>
                            <td><?php echo $d['subtotal']?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </table>
                    </div>
                </div>
            <?php endforeach ?>
            <div style="text-align:center;padding-top:24px;">
                <div id="print" style="width:80%;margin:auto;">
                <button class="btn btn-warning" type="button" style="width:100%">Print</button>
                </div>
            </div>
            </div>
        </div>

        <div class="page-content-wrapper divPemasukan" id="printDiv" style="padding-top:24px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Laporan</h1>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div style="position:relative">
                            <div class="" id="pengeluaran" style="cursor:pointer;left:0;;width:30%;float:left;text-align:center;">
                            <h3 >Pengeluaran</h3>
                            </div>
                            <div class="pressed" id="pemasukan" style="cursor:pointer;right:0px;width:20%;float:right;top:0px;text-align:center;">
                            <h3>Pemasukan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="padding-top:12px">
            <?php foreach($h_trans as $h) : ?>
                <div class="h_trans" id="<?php echo $h['id']?>">
                    <div class="id"><strong>ID - <?php echo $h['id']?></strong></div>
                    <div class="tanggal"><strong><?php echo date_format(date_create($h['date']),'d-F-Y')?></strong></div>
                    <div class="isi"><strong>ID CUSTOMER :<br><?php echo $h['id_customer'];  ?></strong><br><?php echo$h['total']?></div>
                </div>
                <div class="d_trans " id="d<?php echo $h['id']?>">
                    <div class="judul">Details</div>
                    <div class="isi_d">
                    <table class="table table-bordered" cellspacing="0" width="100%" style="border:2px solid black">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub-total</th>
                        </tr>
                        <?php $ctr = 0; 
                            foreach($d_trans as $d) : 
                            $ctr++;
                            if($d['id'] == $h['id']) :?>
                        <tr>
                            <td><?php echo $ctr?></td>
                            <td><?php echo $d['nama']?></td>
                            <td><?php echo $d['jumlah']?></td>
                            <td><?php echo $d['harga']?></td>
                            <td><?php echo $d['subtotal']?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </table>
                    </div>
                </div>
            <?php endforeach ?>
            <div style="text-align:center;padding-top:24px;">
                <div id="print" style="width:80%;margin:auto;">
                <button class="btn btn-warning" type="button" style="width:100%">Print</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("template/footer"); ?>
</body>
<script>
$(document).ready(function(){

   $(".h_trans").click(function(){
    var id = $(this).attr("id");
    // alert($("#d" + id).css("display") );
    if($("#d" + id).css("display") == "none")
        $("#d" + id).fadeIn();
    else
        $("#d" + id).fadeOut();  
   });

   $("#print").click(function(){
        $("#sidebar-wrapper").css("display", "none");
        $(this).css("display", "none");
        $("#wrapper").css("padding-left", "0");
        $("#wrapper").css("margin", "auto");
        window.print();
        $("#wrapper").css("padding-left", "250px");
        $("#sidebar-wrapper").css("display", "block");
        $(this).css("display", "block");
   });

   $(".container-fluid").on("click", "#pemasukan", function(){
    // $("#pemasukan").addClass("pressed");// alert();
    // $("#pengeluaran").removeClass("pressed");
    $(".divPemasukan").css("display", "block");
    $(".divPengeluaran").css("display", "none");
   });

   $(".container-fluid").on("click", "#pengeluaran",function(){
    // $("#pengeluaran").addClass("pressed");
    // $("#pemasukan").removeClass('pressed');
    $(".divPemasukan").css("display", "none");
    $(".divPengeluaran").css("display", "block");
   });
});
</script>
</html>