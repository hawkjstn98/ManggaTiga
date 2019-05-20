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
                    <h5 id="nama" style="font-family: Nunito, sans-serif;"><b>Nama</b></h5>
                    <h5 id="email" style="font-family: Nunito, sans-serif;"><b>Email</b></h5>
                    <h6 id="phone" style="font-family: Nunito, sans-serif;">Nomor Telpon</h6>
                    <h6 id="address" style="font-family: Nunito, sans-serif;">Alamat</h6>
                    <h6 id="saldo" style="font-family: Nunito, sans-serif;">Saldo</h6>
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
                        <div class="col-5"><h5>Total Harga</h5></div>
                        <div class="col-7"><h5 id="sumItemPrice">Rp...</h5></div>
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

    renderCart();
    renderData();

    function renderCart(){
        <?php echo "var basesc='".base_url()."';"; ?>
      //  alert(basesc+'UserData/renderShoppingCart');
        $.ajax({
            url: basesc+'UserData/renderShoppingCart',
            type:'post',
            data: {"username": '<?php echo $this->session->userdata('user')?>'},
            dataType: 'json',
            success: function(res){
                if(res.success){
                    data = res.data;
                    console.log(data);
                    renderItem(data);
                }
                else{
                    alert(res.data);
                }
            }
        });
    }
    function renderData(){
        <?php echo "var basesc='".base_url()."';"; ?>
        $.ajax({
            url: basesc+'ProfileController/renderUserData',
            type: 'post',
            dataType: 'json',
            data: {"username": '<?php echo $this->session->userdata('user')?>'},
            success: function(res){
                console.log(res.data);
                var data = res.data;
                if(res.success){
                    $('#email').html(data[0].email);
                    $('#username').html(data[0].username);
                    $('#address').html(data[0].alamat);
                    // $('#fname').val(data[0].namaDepan);
                    $('#nama').html(data[0].namaDepan+" "+data[0].namaBelakang);
                    $('#phone').html(data[0].noHP);
                    $('#saldo').html("Rp. " +parseInt(data[0].saldo).toLocaleString('id-ID'));
                }
                else{
                    alert(res.data);
                }
            }
        });
    }
    function renderItem(data){
        $("#fieldCartCard").html('');
        let total = 0;
        for(let i = 0; i < data.length; i++) {
            $("#fieldCartCard").append(
                "<div class='card'>" +
                "<div class='row'>" +
                "<div class='col-2'><img src='' width='70' height='70'></div>" +
                "<div class='col-6'>" +
                "<h5>" + data[i].namaBarang + "</h5>" +
                "<hr>" +
                "<h6>" + "Rp. "+parseInt(data[i].harga).toLocaleString('id-ID') + "</h6>" +
                "</div>" +
                "<div class='col-1'></div>" +
                "<div class='col-3'>" +
                "<label>Jumlah : " + data[i].jumlah + " </label>" +
                "<div class='row'>" +
                "<div class='col-4'></div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>");
            total += parseInt(data[i].harga);
        }
        $('#sumItemPrice').html("Rp. "+total.toLocaleString('id-ID'));
    }
    $(".editQty").inputSpinner();
</script>
