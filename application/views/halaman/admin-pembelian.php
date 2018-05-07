<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
<style>
    /* The Modal (background) */
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

.form-control{
    margin:0;
    /* padding:0; */
}


.form-group{
    width:75%;
}

</style>
</head>

<body style="padding:0;" >
<datalist id="test"> 
<?php foreach($product as $p) :?>
<option value="<?php echo $p['nama'] ?>">
<?php endforeach ?>
</datalist>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="d-flex align-items-center sidebar-brand"> <a href="#">Welcome, Admin!</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin">Notifications<span class="text-white"><i class="fa fa-bell-o"></i></span></a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_user">User</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_product">Product</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_article">Article</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_story">Story</a></li>
                <li> <a href="#">Pembelian</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_chart">Laporan</a></li>
            </ul>
        </div>

        <form method="POST" action="">
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:50px;">
                            <h1>Pembelian Stok &nbsp;&nbsp;</h1>
                            <!-- <div class="row no-gutters" style="padding:15px;padding-left:0;padding-right:0;padding-bottom:15px;">
                            </div> -->
                            <hr>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="container">
                            Nama Pemasok: <input type="text" class="form-control" name="pemasok" required>
                        </div>
                    </div>
                    <div class="col-md-4">Tanggal: <input class="form-control" name="tanggal" type="date" min="0" id="tgl" required value="<?php echo date('Y-m-d'); ?>"></div>
                    <div class="col-md-2">
                        <div class="container" style="bottom:0px;position:absolute;">
                            <button class="btn btn-warning" type="button" id="laporan">Laporan</button>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    <div class="" style="margin:17px;">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Stok Sekarang</th>
                <th>Jumlah Beli</th>
                <th>Harga</th>
                <th>Sub-total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    </div>

        <div class="container" style="padding-top:24px;">
            <div style="width:100%;border:0.5px solid lightgrey;">
                <div class="row" style="margin:15px;">
                    <div class="col-md-5"></div>
                    <div class="col-md-2"> Total Harga : </div>
                    <div class="col-md-5">
                     <input type="number" id="total"name="total" class="form-control" readonly style="width:100%">
                    </div>
                </div>
                <div class="row" style="margin:10px;">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="selesai" type="button" style="width:100%">Selesai</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger" id="clear_all" type="button">Hapus Semua</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    
    
    <?php $this->load->view("template/footer"); ?>
</body>
<script>
    $(document).ready(function(){
        var tr = [];
        tr[0] = '<tr id="tr0"><td><input class="form-control" name="id0" type="text" id="id0" readonly style="width:50px;"></td><td><input class="form-control nama-search" name="nama0" list="test" type="text" id="0" required></td><td> <input class="form-control " name="stok0" type="text" id="stok0" readonly style="width:80px;"> </td><td><input class="form-control angka" type="number" min="0" value="0" name="jumlah0" id="jumlah0" required style="width:80px;"></td><td><input class="form-control angka" type="number" min="0" value="0" id="harga0" name="harga0" required style="width:120px;"></td><td><input name="subtotal0" class="form-control angka" type="number" min="0" value="0" id="subtotal0" readonly style="width:120px;"></td><td><button class="btn btn-success tambah" id="0" type="button"><i class="icon ion-android-add"></i> Tambah</button> </td></tr>';
        var ctr = 1;
        $("#tbody").html(tr[0]);
       $("#tbody").on("click", "button.tambah",function(){
        //  alert();
        $(this).removeClass("btn-success");
        $(this).removeClass("tambah");
        $(this).addClass("btn-danger");
        $(this).addClass("delete");
        $(this).html("<i class='icon ion-android-close'></i> Hapus");
        tr[ctr] = '<tr id="tr'+ ctr+'"><td><input class="form-control " name="id'+ ctr+'" type="text" id="id'+ ctr+'" readonly style="width:50px;"></td><td><input class="form-control nama-search" list="test" name="nama'+ ctr+'" type="text" id="'+ ctr+'" required></td><td> <input class="form-control " name="stok'+ ctr+'" type="text" id="stok'+ ctr+'" readonly style="width:80px;"> </td> <td><input class="form-control angka" name="jumlah'+ ctr+'" type="number" min="0" value="0" id="jumlah'+ ctr+'" required style="width:80px;"></td><td><input class="form-control angka" name="harga'+ ctr+'" type="number" min="0" value="0" id="harga'+ ctr+'" required style="width:120px;"></td><td><input class="form-control angka" name="subtotal'+ ctr+'" type="number" min="0" value="0" id="subtotal'+ ctr+'" readonly style="width:120px;"></td><td><button class="btn btn-success tambah" id="'+ ctr+'" type="button"><i class="icon ion-android-add"></i> Tambah</button> </td></tr>';
         $("#tbody").append(tr[ctr]);
         ctr++;
       });

       $("#tbody").on("change", "input.angka", function(){
           refresh_angka();
       });

       function refresh_angka(){
            var total = 0;
            for(var i = 0; i < ctr; i++){
                if($("#jumlah"+i).val()){
                    $("#subtotal"+i).val($("#jumlah"+i).val() * $("#harga"+i).val());
                    total += $("#jumlah"+i).val() * $("#harga"+i).val();
                    // alert($("#jumlah"+i).val());
                }
            }
            $("#total").val(total);
       }

       $("#clear_all").click(function(){
        tr = [];
        tr[0] = '<tr id="tr0"><td><input class="form-control" name="id0" type="text" id="id0" readonly style="width:50px;"></td><td><input class="form-control nama-search" name="nama0" list="test" type="text" id="0" required></td><td> <input class="form-control " name="stok0" type="text" id="stok0" readonly style="width:80px;"> </td><td><input class="form-control angka" type="number" min="0" value="0" name="jumlah0" id="jumlah0" required style="width:80px;"></td><td><input class="form-control angka" type="number" min="0" value="0" id="harga0" name="harga0" required style="width:120px;"></td><td><input name="subtotal0" class="form-control angka" type="number" min="0" value="0" id="subtotal0" readonly style="width:120px;"></td><td><button class="btn btn-success tambah" id="0" type="button"><i class="icon ion-android-add"></i> Tambah</button> </td></tr>';
        var ctr = 1;
        $("#tbody").html(tr[0]);
        refresh_angka();
       });

       $("#selesai").click(function(){
            $("form").attr("action", "<?php echo site_url()?>/Cont_admin/insert_pembelian/"+ctr) ;
            $("form").submit();
       });

       $("#laporan").click(function(){
        window.location = "<?php echo site_url()?>/Route/admin_report";
       });

       var product = []
       $("#tbody").on("keyup", "input.nama-search", function(){
        var name = "";
        name = $(this).val();
        var id = $(this).attr("id");
        // alert(id);
        $.ajax({
            url: "<?php echo site_url() ?>/Cont_api/get_product_name/" + encodeURIComponent(name) ,
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                // console.log(data);
                if(data){
                    $("#stok" + id).val(data.stok);
                    $("#id" + id).val(data.id_product)
                }else{
                    $("#stok" + id).val(0);
                    $("#id" + id).val(0);
                }
            }
        });
        
       });

       $()

       $("#tbody").on("click", "button.delete",function(){
        tmp = $(this).attr("id");
        $("tr#tr" + tmp).remove();
        refresh_angka();
       });
    });

</script>
</html>