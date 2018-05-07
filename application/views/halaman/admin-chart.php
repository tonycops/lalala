<!DOCTYPE html>
<html>

<head>
<?php $this->load->view("template/header"); ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js'></script>
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
                <li> <a href="<?php echo site_url()?>/Route/admin_pembelian">Pembelian</a></li>
                <li> <a href="<?php echo site_url()?>/Route/admin_chart">Laporan</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div style="padding-top:50px;">
                            <h1>Laporan&nbsp;&nbsp;</h1>
                            <!-- <div class="row no-gutters" style="padding:15px;padding-left:0;padding-right:0;padding-bottom:15px;">
                            </div> -->
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            Cari : <input class="" type="text" list="test" id="ajax" style="margin-right:17px;">
                            Urutkan Berdasarkan : 
                            <select id="jenis" style="margin-right:17px;"> <option value="date"> Tanggal </option>
                            <option value="jumlah"> Jumlah </option>
                            <option value="subtotal"> Subtotal </option> </select>
                            <input type="radio" name="urut" value="asc" checked> Terendah
                            <input type="radio" name="urut" value="desc"> Tertinggi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row container" style="margin-top:24px;">
            <div class="col-7">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Rating</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach($h_trans as $h) : ?>
                        <tr>
                            <td> <?php echo $h['id'] ?></td>
                            <td> <?php echo $h['nama'] ?></td>
                            <td> <?php echo $h['date'] ?></td>
                            <td> <?php echo $h['jumlah'] ?></td>
                            <td> <?php echo $h['subtotal'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            
            <div class="col-5">
                <canvas id="myChart" height="300" width="300" ></canvas>
            </div>
        </div>
    
    </div>
    
    
    <?php $this->load->view("template/footer"); ?>
</body>
<script>
var product = <?php echo json_encode($h_trans_all) ?>;
var h_trans = <?php echo json_encode($h_trans) ?>;
var d_trans = <?php echo json_encode($d_trans) ?>;
var ctx = document.getElementById("myChart");
var subtotal = [];
var usedTable = [];
product.forEach(myfunction);

function myfunction(item, index) {
    subtotal.push({y : item['total'].substring(3,item['total'].length-2), x : new Date(item['date'] )});
    console.log(item['date']);
}

usedTable = h_trans;

var bgc1 = 'rgba(75, 192, 192, 0.3)';
var bc1 = 'rgba(75, 192, 192, 1)';
function makechart(mydata, bgc, bc){
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: '# of Subtotal',
                data: mydata,
                backgroundColor: [
                    bgc
                ],
                borderColor: [
                    bc
                ],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    type : 'time',
                    time :{
                    }
                }]
            }
        }
    });
}


    $(document).ready(function(){
        function normal(){
            makechart(subtotal, bgc1, bc1);
            var tmp = "";
            h_trans.forEach(function(item,index){
                tmp += "<tr>";
                tmp += "<td>" +  item['id']  + "</td>"
                tmp += "<td>" +  item['nama']  + "</td>"
                tmp += "<td>" +  item['date']  + "</td>"
                tmp += "<td>" +  item['jumlah']  + "</td>"
                tmp += "<td>" +  item['subtotal']  + "</td>"
                tmp += "</tr>";
            });
            $("#tbody").html(tmp);
            usedTable = h_trans;
        }
        normal();

        function ajax(){
            var name = "";
            name = $("#ajax").val();
            var id = $("#ajax").attr("id");
            if(name == ""){
                normal();
            } 
            $.ajax({
                url: "<?php echo site_url() ?>/Cont_api/get_product_name/" + encodeURIComponent(name) ,
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                success: function (data) {
                    // console.log(data);
                    if(data){
                        var tmp = [];
                        usedTable = [];
                        h_trans.forEach(function(item, index){
                            if(data.nama == item['nama']){
                                tmp.push({y : item['subtotal'], x : item['date']}); 
                                usedTable.push(item);
                                refreshTable(usedTable, $("select#jenis option:selected" ).val(), $("input[name='urut']:checked").val())
                            }
                            console.log(item.nama);
                        });
                        makechart(tmp, bgc1, bc1 );
                        
                    }else{
                        
                    }
                }
            });
        }
       
       function refreshTable(table,combo,radio){
            console.log(table);
            for(var i = 0; i < table.length; i++){
                for(var j = i + 1; j < table.length; j++){
                    if(combo == "date"){
                        if(radio == "asc"){
                            if(new Date(table[j][combo]) < new Date(table[i][combo])){
                                var tmp = table[j];
                                table[j] = table[i];
                                table[i] = tmp;
                            }
                        }else{
                            if(new Date(table[j][combo]) > new Date(table[i][combo])){
                                var tmp = table[j];
                                table[j] = table[i];
                                table[i] = tmp;
                            }
                        }
                    }else {
                        if(radio == "asc"){
                            if(table[j][combo] < table[i][combo]){
                                var tmp = table[j];
                                table[j] = table[i];
                                table[i] = tmp;
                            }
                        }else{
                            if(table[j][combo] > table[i][combo]){
                                var tmp = table[j];
                                table[j] = table[i];
                                table[i] = tmp;
                            }
                        }
                    }
                }   
            }
            
            var tmpS = "";
            table.forEach(function(item,index){
                tmpS += "<tr>";
                tmpS += "<td>" +  item['id']  + "</td>"
                tmpS += "<td>" +  item['nama']  + "</td>"
                tmpS += "<td>" +  item['date']  + "</td>"
                tmpS += "<td>" +  item['jumlah']  + "</td>"
                tmpS += "<td>" +  item['subtotal']  + "</td>"
                tmpS += "</tr>";
            });
            $("#tbody").html(tmpS);
       }

       $("input[name='urut']").change(function(){
        refreshTable(usedTable, $("select#jenis option:selected" ).val(), $("input[name='urut']:checked").val())
       });

       $("select#jenis").change(function(){
        refreshTable(usedTable, $("select#jenis option:selected" ).val(), $("input[name='urut']:checked").val())
       });

        $("#ajax").keyup( function(){
           ajax();
        });

        
    });

</script>
</html>