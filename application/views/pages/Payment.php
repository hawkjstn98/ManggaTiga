<!DOCTYPE html>
<html>
<head>
    <title>Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
    ?>
    <script src="<?php echo base_url('assets/js/bootstrap-input-spinner.js'); ?>"></script>
</head>
<body>
    <?php 
        echo $staticnavbarLoggedin;
    ?>
    <div class="container-fluid" style="margin-top:40.833px;">
        <div class="row" style="margin-bottom:40px;">
            <!-- Ini buat konten list item yang uda di card-->
            <div class="col-8" style="margin-top:20px;">
                <div id="fieldPembeli" class="container">
                    <h3 style="font-family: Nunito, sans-serif; padding-top:25px;">Check Out</h3>
                    <h4 style="font-family: Nunito, sans-serif;">Alamat Pengiriman</h4>
                    <hr>
                    <h5 id="username" style="font-family: Nunito, sans-serif;"><b>Nama</b></h5>
                    <h5 id="username" style="font-family: Nunito, sans-serif;"><b>Email</b></h5>
                    <h6 id="username" style="font-family: Nunito, sans-serif;">Nomor Telpon</h6>
                    <h6 id="username" style="font-family: Nunito, sans-serif;">Alamat</h6>
                    <h6 id="username" style="font-family: Nunito, sans-serif;">Saldo</h6>
                </div>
                <div id="fieldCartCard" class="container">
                </div>
            </div>
            <!-- ini buat field list harga & sum total -->
            <div class="col-4">
                <div class="card">
                    <h4>Shopping Summary</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8"><h5>Total Harga</h5></div>
                        <div class="col-4"><h5 id="sumItemPrice">Rp...</h5></div>
                    </div>
                    <hr>
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('Redirect/payment');?>'" type="button">Beli</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        echo $footer;
    ?>
</body>
<script>
    var pathItemImage="";
    $("#fieldCartCard").append(
        "<div class='card'>"+
            "<div class='row'>"+
                "<div class='col-2'><img src='" + pathItemImage + "' width='70' height='70'></div>"+
                    "<div class='col-6'>"+
                        "<h5>[disini nama barang]</h5>"+
                        "<hr>"+
                        "<h6>[disini harga]</h6>"+
                    "</div>"+
                    "<div class='col-1'></div>"+
                        "<div class='col-3'>"+
                            "<label>Jumlah : </label>"+
                            "<div class='row'>"+
                                "<input class='editQty' placeholder='Enter number' value='' min='0' max='50' type='number' class='input' required>"+
                                "<div class='col-4'></div><button align='center' style='margin-top:10px; margin-left:' class='btn btn-secondary bg-danger'><i class='fa fa-trash'></i></button>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
            "</div>"+
        "</div>"
    );
    $(".editQty").inputSpinner();
</script>
