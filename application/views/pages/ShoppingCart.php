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
    <?php
        echo $filledcart;
    ?>
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
                        "<h5>[disini nama barang]</h6>"+
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
