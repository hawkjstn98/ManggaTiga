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
        if($this->session->has_userdata('user')){echo $staticnavbarLoggedin; } else { echo $staticnavbarUnloggedin; } ; 
        //echo $staticnavbarUnloggedin;
        //echo $dynamicnavbar;
    ?>
    
    <script>
        $(document).ready(function(){
            var judul = localStorage.getItem("id");
            //alert(judul);
            $("#judulCategory").text(judul);
        });
    </script>
    <div class="row" style="margin-top:40px;">
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
                <div class="container" id="brandContainer">

                </div>
            <hr>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h1 style="margin-top:5px;" id="judulCategory"></h1>
            <hr>
            <div class="container" style="margin-bottom:25px;">
                <div class="row" id="categoryProduct">

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
        var red = '<?php echo base_url('index.php/Redirect/detail');?>';
        $.ajax({
            url: basds + 'CategoryController/renderCategory',
            type: 'post',
            dataType: 'json',
            data: {'category' : cat},
            success: function (res) {
                if (res.success) {
                   productData = res.data;
                   a = $('#categoryProduct');
                    for(let i = 0; i < res.data.length; i++){
                        let hJual = productData[i].hargaJual * 1;
                        let hJualDis = productData[i].hargaJual*(100-productData[i].persen)/100;
                        let harga = (productData[i].stock <= 0 ? ('<p class="card-text" id="cardHarga" style="color:red;">Out of Stock</p>') : (productData[i].persen > 0 ? ('<p class="card-text" id="cardHarga"> <del><a style="color:red;"> Rp. '+ hJual.toLocaleString('id-ID') +'</a></del></p> <p class="card-text" id="cardHarga"> Rp. '+hJualDis.toLocaleString('id-ID')+'</p>') : ('<p class="card-text" id="cardHarga"> Rp. '+hJual.toLocaleString('id-ID')+'</p>')));
                        a.append(
                            '<div class="card" style="width: 18rem; margin-left:50px;">'+
                            '<div class="card-body">' +
                            '<a href="'+red+'">'+
                            '<img class="card-img-top '+ (productData[i].stock <= 0 ? ('overlay') : '') +'" alt="Card image cap" src="http://localhost/assets/logo/Ourlogo.png">'+
                            '<div class="card-body">'+
                            '<h5 class="card-title" align="center" id="cardNamaBarang">'+productData[i].barangNama+'</h5>'+
                            '</div>'+
                            '</a>'+
                            '</div>' +
                            '<div class="card-footer" align="center" style="margin-bottom:10px">'+
                            harga +
                            '</div>'+
                            '</div>');
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
                    bc = $('#brandContainer');
                    let brandTemp = [];
                    for(let i = 0; i < brand.length ; i++){
                        let check = false;
                        for(let j = 0; j < brandTemp.length; j++){
                            if(brandTemp[j]==brand[i].brandNama){
                                check = true;
                            }
                        }
                        if(!check){
                            bc.append('<div class="form-check">'+
                                '<label class="form-check-label" for="merk1">'+
                                '<input type="checkbox" class="form-check-input" name="merk" value="something">'+brand[i].brandNama+
                                '</label>'+
                                '</div>'
                            )
                            brandTemp.push(brand[i].brandNama);
                        }
                    }
                    }
                else {
                    //alert(res.data);
                    //console.log(res);
                }
            }
        });

    </script>
</body>