<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
<style>
.my-modal{
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.my-modal-content{
    background-color: #fefefe;
    margin: 5% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
}
</style>
</head>

<body style="padding:0;">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="d-flex align-items-center sidebar-brand"> <a href="#">Welcome, Admin!</a></li>
                <li> <a href="#">Notifications<span class="text-white"><i class="fa fa-bell-o"></i></span></a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_user">User</a></li>
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
                            <h1>Notifications</h1>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h3>Transaction</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>No Pembayaran</th>
                <th>Jumlah Transfer</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
        <?php foreach($notif as $n)   : ?>
            <form method="post" action="<?php echo site_url() ?>/Cont_admin/deleteNotification/<?php echo $n['id']?>">
                <tr>
                    <td><label><?php echo $n['id'] ?></label></td>
                    <td><label><?php echo $n['no_pembayaran'] ?></label></td>
                    <td><label><?php echo $n['jumlah_transfer'] ?></label></td>
                    <td><label><?php echo $n['tgl_transfer'] ?></label></td>
                    <td><label><?php echo $n['deskripsi'] ?></label></td>
                    <td><button class="btn btn-outline-primary detail" style="margin-right:5px;" type="button" id="<?php echo $n['id']?>" ><i class="fa fa-pencil-square-o"></i>Details</button>
                    <button class="btn btn-outline-danger" type="submit">Delete<i class="icon ion-android-delete float-left"></i></button>
                    <button class="btn btn-outline-success approve" type="button" id="<?php echo $n['id']?>">Approve<i class="icon ion-android-done float-left"></i></button>
                    <input type="hidden" value=<?php echo $n['gambar']?> id="gambar<?php echo $n['id']?>">
                    </td>
                </tr>     
            </form>
            <?php endforeach ?>
            
        </tbody>
    </table></div>
    <?php $this->load->view("template/footer"); ?>
    <div id="modal" class="my-modal" >
        <div class="my-modal-content" >
            <div class="header">
                <h3> Detail Pengiriman </h3>
            </div>
            <hr>
            <div class="modal-body">
                <div class="col" style="background-color:#efefef;padding:17px;">
                        <form id="formModal" method="post" enctype="multipart/form-data" style="background-color:#eef4f7;padding:15px;" action="<?php echo site_url()?>/Cont_admin/insert_kirim">
                            <div class="form-group"><input id="nomorResi" class="form-control" type="text" name="nomorResi" required="" value="" placeholder="Nomor Resi"></div>
                            <div class="form-group"><input id="paket" class="form-control" type="text" name="paket" required="" value="" placeholder="Pengiriman via"></div>
                            <div class="form-group"><input id="pembayaran" class="form-control" type="text" name="pembayaran" required="" value="" placeholder="No Pembayaran"></div>
                            <div class="form-group"><textarea id="deskripsi" class="form-control" type="text" name="deskripsi" required="" value="" placeholder="Deskripsi"></textarea></div>
                            <button class="btn btn-success col-6" type="submit">Insert</button>
                            <button class="btn btn-danger col-2 float-right cancelModal" type="button" >Cancel</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div id="modalDetail" class="my-modal" >
        <div class="my-modal-content" >
            <div class="header">
                <h3> Detail Pengiriman </h3>
            </div>
            <hr>
            <div class="modal-body">
                <div class="col" style="background-color:#efefef;padding:17px;">
                        <img id="modalimg" src="" style="width:100%;height:100%;">
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".approve").click(function(){
            $("#modal").css("display", "block");
        });

        $(".detail").click(function(){
            $("#modalDetail").css("display", "block");
            // alert($("#gambar" + $(this).attr("id")).val());
            $("#modalimg").attr("src", "<?php echo base_url() ?>/assets/img/" + $("#gambar" + $(this).attr("id")).val());
        });

        $("#modalDetail").click(function(){
            $(this).css("display", "none");
        });

        $(".cancelModal").click(function(){
            $("#modal").css("display", "none");
        });
    });
</script>
</html>