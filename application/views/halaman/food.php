<!DOCTYPE html>
<html style="font-family:Lato, sans-serif;">

<head>
    <?php $this->load->view("template/header"); ?>
    <style>
        #ajax-search{
            /* position:absolute; */
            /* width:100%; */
            /* top:100%; */
            max-height:100%;
            background-color:white;
        }
        .hasil-search{
            padding-left:10px;
        }

        .hasil-search:hover{
            background-color: lightblue;
            cursor:pointer;
        }

    </style>
</head>

<body style="font-family:Lato, sans-serif;padding:0px">
    <?php $this->load->view("template/navbar_product"); ?>
    <div id="wrapper">
        <?php $this->load->view("template/menu-left"); ?>
        <div class="page-content-wrapper" style="font-family:Lato, sans-serif;">
            <div class="container-fluid">
            <form action="<?php echo site_url()?>/Cont_trans/search/food" method="post">    
            <div class="search-container" style="margin-top:0px;">
                <a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div style="width:100%">
                    <input autocomplete="off" type="text" name="search-bar" placeholder="Search..." class="search-input" onkeyup="showResult(this.value)">
                    <div id="ajax-search"></div>
                </div>
            <button class="btn btn-light search-btn" type="submit"> <i class="fa fa-search"></i></button>
            </div>
            </form>
                <div
                    class="row" style="font-family:Lato, sans-serif;">
                    <div class="col-md-12">
                        <div>
                            <h1 style="font-family:Lato, sans-serif;">Food</h1>
                        </div>
                        <?php if(!empty($search)) : ?>
                        <p style="font-family:Lato, sans-serif;">Anda mencari : ' <?php echo $search?> '</p>
                        <?php else :?>
                        <p style="font-family:Lato, sans-serif;">Semua mengenai makanan kura - kura blablabla</p>
                        <?php endif ?>
                    </div>
            </div>
        </div>
        <div class="row product-list" style="font-family:Lato, sans-serif;min-height:50vh;margin-left:0px;">
            <?php foreach($item_product as $items) :?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 d-flex product-item" style="font-family:Lato, sans-serif;min-width:33.3333%;">
                <div class="product-container" style="min-width:100%;">
                    <form action="<?php echo site_url() ?>/Cont_trans/addToCart/food" method="POST">   
                    <div class="row">
                        <div class="col-md-12"><a href="#" class="product-image"><img src="<?php echo base_url()?>/assets/img/<?php echo $items['gambar']?>"></a></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h2><a href="#" style="font-family:Lato, sans-serif;font-weight:bold;"><?php echo $items['nama']?></a></h2>
                        </div>
                        <div class="col-3" style="padding:0px;">
                            <p class="float-right" style="padding-right:0px;font-family:Lato, sans-serif;">Qty :&nbsp;</p>
                        </div>
                        <div class="col-3" style="padding-left:0px;"><input type="number" name="qty" value="1" placeholder="1" min="1" max=<?php echo $items['stok'] ?> style="width:100%;margin-top:3px;font-family:Lato, sans-serif;"></div>
                    </div>
                    <div class="product-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i><a href="#" class="small-text">82 reviews</a></div>
                    <div class="row">
                        <div class="col-12">
                            <p class="product-description" style="font-family:Lato, sans-serif;"><?php echo $items['deskripsi']?></p>
                            <div class="row">
                                    <?php if($items['stok']) :?>
                                    <div class="col-6 d-inline-flex align-items-center"><button class="btn btn-success" type="submit" style="font-family:Lato, sans-serif;">Add to Cart</button></div>
                                    <?php else :?>
                                    <div class="col-6 d-inline-flex align-items-center"><button class="btn btn-danger sold-out" type="button" disabled="disabled">Sold Out!</button></div>
                                    <?php endif ?>
                                <div class="col-6"><label class="col-form-label float-right" style="font-size:20px;font-family:Lato, sans-serif;"><strong>Rp. <?php echo number_format($items['harga'],0,".",".")?>,-</strong><br></label></div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $items['id_product']?>">
                            <input type="hidden" name="name" value="<?php echo $items['nama']?>">
                            <input type="hidden" name="harga" value="<?php echo $items['harga']?>">
                            <input type="hidden" name="gambar" value="<?php echo $items['gambar']?>">
                            <input type="hidden" name="deskripsi" value="<?php echo $items['deskripsi']?>">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    </div>
    </div>
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
                    <div class="col-sm-4 col-md-3 item" style="padding:auto;padding-right:0px;padding-left:0px;"><a class="d-flex justify-content-center" href="http://www.limabenua.com" target="_parent"><img class="img-fluid" src="<?php echo base_url()?>/assets/img/12_20170727_08512234.gif"></a></div>
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
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("ajax-search").innerHTML="";
    document.getElementById("ajax-search").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("ajax-search").innerHTML=this.responseText;
      document.getElementById("ajax-search").style.border="1px solid #A5ACB2";
      document.getElementById("ajax-search").style.borderTop="0px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","<?php echo site_url()?>/Cont_trans/ajaxSearch/food/"+str,true);
  xmlhttp.send();
}
</script>
</html>