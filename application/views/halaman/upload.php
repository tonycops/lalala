<!DOCTYPE html>
<html>

<?php $this->load->view("template/header"); ?>

<body style="padding:0px;">
<?php $this->load->view("template/navbar"); ?>
    <div class="container">
        <h3>Upload Bukti Transfer</h3>
        <hr>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <div class="row" style="background-color:#eef4f7;">
            <div class="col" data-aos="fade-left" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>No. Pembayaran :&nbsp;</strong></label><select><optgroup label="No. Pembayaran">
            <?php $tmp = 0; foreach($kode as $k) : ?>
            <?php if(!$tmp) : ?>
            <option value="<?php echo $tmp ?>" selected=""><?php echo $k["id"] ?></option>
            <?php else : ?>
            <option value="<?php echo $tmp ?>" ><?php echo $k["id"] ?></option>
            <?php endif;
            $tmp++; ?>
            <?php endforeach ?>
            </optgroup></select></div>
            <div class="col"
                data-aos="fade-left" data-aos-delay="100" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>Dibuat Pada :&nbsp;</strong></label><label id="date" class="col-form-label"><?php echo $kode[0]["date"] ?><br></label></div>
            <div class="col d-flex flex-row justify-content-end" data-aos="fade" data-aos-delay="200" style="font-family:Lato, sans-serif;"><label class="col-form-label"><strong>Total :&nbsp;</strong></label><label id="total" class="col-form-label"><?php echo $kode[0]["total"] ?><br></label></div>
        </div>
        <hr>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub-total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($d_trans as $d) : ?>
            <tr>
                <td> <?php echo $d['id'] ?> </td>
                <td> <?php echo $d['nama'] ?> </td>
                <td> <?php echo $d['jumlah'] ?> </td>
                <td> <?php echo $d['harga'] ?> </td>
                <td> <?php echo $d['subtotal'] ?> </td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
        <div class="row" style="height:220px;">
            <div class="col" style="background-color:#eef4f7;">
                <div data-aos="fade-up" data-aos-delay="250" class="dashed_upload"><div class="wrapper">
    <form action="<?php echo site_url()?>/Cont_trans/upload" method="post" enctype="multipart/form-data">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple type="file" name="gambar"/>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script></div>
            </div>
        </div>
        <hr>
            <div class="form-row profile-row">
                <div class="col-md-12" style="background-color:#eef4f7;">
                    <div class="form-group" data-aos="fade-up" data-aos-delay="300"><label>Nomor Pembayaran</label><input class="form-control" placeholder="Masukkan Nomor Rekening Anda" type="text" autocomplete="off" required="" name="no"></div>
                    <div class="form-group" data-aos="fade-up" data-aos-delay="350"><label>Jumlah Transfer</label><input class="form-control" placeholder="Jumlah Rupiah yang Anda Transfer" type="text" autocomplete="off" required="" name="jumlah"></div>
                    <div class="form-group" data-aos="fade" data-aos-delay="400"><label>Tanggal Transfer</label><input class="form-control" type="date" name="tgl" ></div>
                    <div class="form-group" data-aos="fade-up" data-aos-delay="450"><label>Berita Transfer</label><input class="form-control" placeholder="Berita Transfer (Jika Ada)" type="text" autocomplete="off" name="deskripsi" ></div>
                </div>
                <input type="hidden" id="id_trans" value="" name="id">
            </div>
        <hr>
        <div class="row">
            <div class="col d-flex flex-row justify-content-end"><button class="btn btn-success" type="submit">Upload</button></div>
        </div>
        </form>
    </div>
    <div class="container profile profile-view" id="profile">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
            </div>
        </div>
    </div>
<?php $this->load->view("template/footer"); ?>
</body>
<script src="<?php echo base_url()?>/assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var arr = <?php echo json_encode($kode) ?>;
    var arr_d_trans = <?php echo json_encode($all_d_trans) ?>;
    $("select").change(function(){
        $("label#date").html(arr[$(this).val()]['date']);
        $("label#total").html(arr[$(this).val()]['total']);
        var id = arr[$(this).val()]['id'];
        var string = "<tr>";
        $.each(arr_d_trans,function(index,value){
            if(value['id'] == id){
                string += "<tr>";
                string += "<td>" + value['id'] + "</td>";
                string += "<td>" + value['nama'] + "</td>";
                string += "<td>" + value['jumlah'] + "</td>";
                string += "<td>" + value['harga'] + "</td>";
                string += "<td>" + value['subtotal'] + "</td>";
                string += "</tr>";
            }
        });
        string += "</tr>"
        $("tbody").html(string);
    });
});
</script>
</html>
