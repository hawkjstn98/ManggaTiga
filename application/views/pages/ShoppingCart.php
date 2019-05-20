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
            <h3 style="font-family: Nunito, sans-serif; padding-top:25px;">Item in Cart</h3>
            <hr>
            <div id="fieldCartCard" class="container">
                
            </div>
        </div>
        <!-- -->
        <!-- ini buat field list harga & sum total -->
        <div class="col-4">
            <div class="card">
                <h4>Shopping Summary</h4>
                <hr>
                <div class="row">
                    <div class="col-5"><h5>Total Harga</h5></div>
                    <div class="col-7"><h5 id="sumItemPrice"></h5></div></div>
                <hr>
                <button class="btn bg-success" style="color: white " onclick="window.location.href='<?php echo base_url('Redirect/payment');?>'" type="button">Beli</button>
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
    var data = [];
    <?php echo "var basesc='".base_url()."';"; ?>

    renderCart();

    function renderCart(){
        $.ajax({
            url: basesc+'UserData/renderShoppingCart',
            type:'post',
            data: {"username": '<?php echo $this->session->userdata('user')?>'},
            dataType: 'json',
            success: function(res){
                if(res.success){
                    data = res.data;
                    renderItem(data);

                }
                else{
                    if(res.data==null){
                        alert("No Cart");
                    }
                    else{
                        alert(res.data);
                    }
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
                "<div class='col-2'><img src='" + pathItemImage + "' width='70' height='70'></div>" +
                "<div class='col-6'>" +
                "<h5>" + data[i].namaBarang + "</h5>" +
                "<hr>" +
                "<h6>" + "Rp. "+parseInt(data[i].harga).toLocaleString('id-ID') + "</h6>" +
                "</div>" +
                "<div class='col-1'></div>" +
                "<div class='col-3'>" +
                "<label>Jumlah : " + data[i].jumlah + " </label>" +
                "<div class='row'>" +
                "<div class='col-4'></div><button align='center' style='margin-top:10px; margin-left:' class='btn btn-secondary bg-danger' onclick='deleteItem(" + '"' + data[i].namaBarang + '"' + ")'><i class='fa fa-trash'></i></button>" +
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
    function deleteItem(nama){
        for(let i = 0 ; data.length; i++){
            if(data[i].namaBarang==nama){
               // data.pop(data,i);
                data.splice(i,1);
                renderItem(data);
                //abis render ulang mustinya di request lagi biar shopping cartnya ke update
                updateCart(data);
                break;
            }
        }
    }

    function updateCart(data){
        $.ajax({
            url: basesc+'UserData/updateShoppingCart',
            type:'post',
            data: {"jsonData" : JSON.stringify(data)},
            dataType: 'json',
            success: function(res){
                if(res.success){
                    alert(res.data);
                }
                else{
                    alert(res.data);
                }
            }
        });
    }


</script>
