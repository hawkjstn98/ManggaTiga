<!DOCTYPE html>
<html>
<head>
  <title>Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
    ?>
</head>
<body>
    <?php 
        echo $staticnavbarUnloggedin;
        echo $dynamicnavbar;
    ?>
    <script>
        $(document).ready(function(){
            var judul = localStorage.getItem("id");
            //alert(judul);
            $("#judulCategory").text(judul);
        });
    </script>
    <div class="row">
        <nav class="col-md-2 bg-dark d-none d-md-block bg-light sidebar fixed-left">
            <h4 align="center" style="margin-top:10px;">Range Harga</h4>
            <hr>
                <div class="container">
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Dari">
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="number" class="form-control" placeholder="Hingga">
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-5">
                            <button id="btnClear" type="submit" class="btn btn-primary bg-success">Clear</button>
                        </div>
                        <div class="col-5">
                            <button id="btnFilterHarga" type="submit" class="btn btn-primary bg-success">Filter</button>
                        </div>
                    </div>
                </div>
            <hr>
            <h4 align="center">Merk</h4>
            <hr>
                <div class="container">
                    <div class="form-check">
                        <label class="form-check-label" for="merk1">
                            <input type="checkbox" class="form-check-input" name="merk" value="something">Merk 1
                        </label>
                    </div>
                </div>
            <hr>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 style="margin-top:5px;" id="judulCategory"></h1>
            <hr>
            <div class="container" style="margin-bottom:25px;">
                <div class="row">
                    <?php
                    ?>
                </div>
            </div>
        </main>
    </div>
    
    <?php
        echo $footer;
    ?>
    <script>
        var basds = '<?php echo base_url() ?>';
        let cat = localStorage.getItem("category");
        var productData = '';
        var brand = '';
        $.ajax({
            url: basds + 'CategoryController/renderCategory',
            type: 'post',
            dataType: 'json',
            data: {'category' : cat},
            success: function (res) {
                if (res.success) {
                   productData = res.data;
                   for(let  i = 0 ; i < productData.length; i ++){

                   }
                } else {
                    //alert(res.data);
                   // console.log(res);
                }
            }
        });

        $.ajax({
            url: basds + 'CategoryController/renderBrandFilter',
            type: 'post',
            data: {'category' : cat},
            dataType: 'json',
            success: function (res) {
                if (res.success) {
                    brand = res.data;
                    console.log(brand);
                } else {
                    //alert(res.data);
                    //console.log(res);
                }
            }
        });

    </script>
</body>