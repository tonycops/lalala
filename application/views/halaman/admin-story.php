<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
<style>
    /* The Modal (background) */
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
    width: 80%; /* Could be more or less, depending on screen size */
}
.form-group{
    width:75%;
}
/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>

<body style="padding:0;" >
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="d-flex align-items-center sidebar-brand"> <a href="#">Welcome, Admin!</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin">Notifications<span class="text-white"><i class="fa fa-bell-o"></i></span></a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_user">User</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_product">Product</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_article">Article</a></li>
                <li> <a href="#">Story</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_pembelian">Pembelian</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_chart">Laporan</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:50px;">
                            <h1>Story &nbsp;&nbsp;</h1>
                            <!-- <div class="row no-gutters" style="padding:15px;padding-left:0;padding-right:0;padding-bottom:15px;">
                            </div> -->
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <h5><button class="btn btn-success" type="button" id="click-insert">Tambah Data Baru<i class="material-icons float-left">add</i></button></h5>
                            </div>                        
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="" style="margin:17px;">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <!-- <th>Gambar</th> -->
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $ctr = 1; foreach($product as $p) : ?>
                <tr>
                    <td><label><?php echo $ctr ?></label></td>
                    <td><p id="updateNama<?php echo $p['id_product']?>"><?php echo $p['nama'] ?></p></td>
                    <td><p id="updateStok<?php echo $p['id_product']?>"><?php echo $p['stok'] ?></p></td>
                    <td><p id="updateHarga<?php echo $p['id_product']?>"><?php echo $p['harga'] ?></p></td>
                    <!-- <td><input type="file" style="width:210px" name="gambar" /></td> -->
                    <td><p id="updateDeskripsi<?php echo $p['id_product']?>"><?php echo $p['deskripsi'] ?></p></td>
                    <td><p id="updateJenis<?php echo $p['id_product']?>"><?php echo $p['jenis'] ?></p></td>
                    <td style="min-width:200px;"><button class="btn btn-outline-primary click-update" style="margin-right:5px;" type="button" name="update" value="<?php echo $p['id_product']?>" >Update</button>
                    <input type="hidden" value="<?php echo base_url(). "assets/img/". $p['gambar']?>" id="updateGambar<?php echo $p['id_product']?>">
                    <button class="btn btn-outline-danger deleteProduct" type="submit" id="delete" value="<?php echo $p['id_product']?>">Delete<i class="icon ion-android-delete float-left" ></i></button></td>
                </tr>
            <?php $ctr++;endforeach ?>
        </tbody>
    </table>
    </div>
    </div>

    <form method="post" enctype="multipart/form-data" action="" id="formUpdate">
    <div id="modalUpdate" class="my-modal" >
        <div class="my-modal-content" >
            <div class="header">
                <h3> Update </h3>
            </div>
            <hr>
            <div class="modal-body" >
                <div class="col" style="background-color:#efefef;padding:17px;">
                        <form method="post" enctype="multipart/form-data" style="background-color:#eef4f7;padding:15px;" action="<?php echo site_url()?>/Cont_admin/insert_product">
                            <div class="" style="float:right width:auto;">
                                <div style="width:150px;height:150px; float:right;">
                                    Gambar: 
                                    <img id="formUpdateGambar" src="" style="width:100%;height:100%">
                                    <input type="file" id="g1" name="gambar" style="display:none">
                                    <label for="g1" >Change Image </label>
                                </div>
                                
                            </div>
                            <div class="form-group">Nama: <input id="formUpdateNama" class="form-control" type="text" name="nama" required="" placeholder="Nama Barang"></div>
                            <div class="form-group">Stok: <input id="formUpdateStok" disabled class="form-control" type="number" name="stok" required="" placeholder="Stok" min="0"></div>
                            <div class="form-group">Harga: <input id="formUpdateHarga" class="form-control" type="number" name="harga" required="" placeholder="Harga" min="0"></div>
                            <div class="form-group">Deskripsi: <textarea id="formUpdateDeskripsi" class="form-control" type="text" name="deskripsi" required="" placeholder="Deskripsi"></textarea></div>
                            <div class="form-group">Jenis: <select id="formUpdateJenis" class="form-control" name="jenis"><optgroup label="Jenis"><option value="turtle" selected="">Turtle</option><option value="accessories">Accessories</option><option value="food">Food</option><option value="medicine">Medicine</option><option value="collection">Collection</option></optgroup></select></div>
                            
                            <button class="btn btn-success col-9" type="submit" name="Update">Update</button>
                            <button class="btn btn-danger col-2 float-right cancelModal" type="button" >Cancel</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url()?>/Cont_admin/insert_product">
    <div id="modalInsert" class="my-modal" >
        <div class="my-modal-content" >
            <div class="header">
                <h3> Update </h3>
            </div>
            <hr>
            <div class="modal-body">
                <div class="col" style="background-color:#efefef;padding:17px;">
                        <form method="post" enctype="multipart/form-data" style="background-color:#eef4f7;padding:15px;" action="<?php echo site_url()?>/Cont_admin/insert_product">
                            <div class="form-group"><input id="updateNama<?php echo $p['id_product']?>" class="form-control" type="text" name="nama" required="" value="" placeholder="Nama Barang"></div>
                            <div class="form-group"><input id="updateStok<?php echo $p['id_product']?>" class="form-control" type="number" name="stok" required="" value="" placeholder="Stok" min="0"></div>
                            <div class="form-group"><input id="updateHarga<?php echo $p['id_product']?>" class="form-control" type="number" name="harga" required="" value="" placeholder="Harga" min="0"></div>
                            <div class="form-group"><textarea id="updateDeskripsi<?php echo $p['id_product']?>" class="form-control" type="text" name="deskripsi" required="" value="" placeholder="Deskripsi"></textarea></div>
                            <div class="form-group"><select id="updateJenis" class="form-control" name="jenis"><optgroup label="Jenis"><option value="turtle" selected="">Turtle</option><option value="accessories">Accessories</option><option value="food">Food</option><option value="medicine">Medicine</option><option value="collection">Collection</option></optgroup></select></div>
                            <div class="form-group"><input type="file" name="gambar" required=""></div>
                            <button class="btn btn-success col-9" type="submit">Insert</button>
                            <button class="btn btn-danger col-2 float-right cancelModal" type="button" >Cancel</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </form>
    
    <?php $this->load->view("template/footer"); ?>
</body>
<script>
    $(document).ready(function(){
        // $("input").dblclick(function(){
        //     $(this).removeAttr('readonly');
        // });
        // $("input").focusout(function(){
        //     $(this).prop('readonly','true');
        // });
        $(".cancelModal").click(function(){
            $("#modalUpdate").css("display", "none");
            $("#modalInsert").css("display", "none");
        });

        $(".click-update").click(function(){
            $("#modalUpdate").css("display","block");
            $('#formUpdate').attr("action", "<?php echo site_url()?>/Cont_admin/update_product/" + $(this).val());
            $("#formUpdateNama").val($("#updateNama" + $(this).val()).html());
            $("#formUpdateStok").val($("#updateStok" + $(this).val()).html());
            $("#formUpdateHarga").val($("#updateHarga" + $(this).val()).html() ); //alert($("#formUpdateHarga").val());
            $("#formUpdateDeskripsi").val($("#updateDeskripsi" + $(this).val()).html());
            $("#formUpdateJenis").val($("#updateJenis" + $(this).val()).html() ).change(); //alert($("#updateJenis"+ $(this).val()).html());
            $("#formUpdateGambar").attr("src", $("#updateGambar" + $(this).val()).val());
        });

        $("#click-insert").click(function(){
            $("#modalInsert").css("display", "block");
        });

        $(".deleteProduct").click(function(){
            // alert($(this).val());
            window.location = "<?php echo site_url() ?>" +"/Cont_admin/delete_product/" + $(this).val();
        });
    });

</script>
</html>