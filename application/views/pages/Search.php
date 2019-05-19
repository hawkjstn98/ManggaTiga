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
        echo $dynamicnavbar;
               
    ?>
    <div class="container">
        <div class="row">
            <h3 style="font-family: Nunito, sans-serif; padding-top:25px;" id="search"></h3>
            <div class="container" style="margin-bottom:25px;">
                <div class="row" id="cardSearch">
                

                    <?php
                        if($produk==null){
                            echo "<div class='col-3'></div><div class='col-9'><img src=". base_url('/assets/logo/notfound.png') . "></img></div>";
                        }
                        else{
                            $red = base_url('index.php/RedirectController/toDetail/');
                            $hargaJual = 0;
                            $counter = 0;
                            foreach($produk as $row){
                                // echo "alert(". $row->stock.gettype() .");";
                                $hargaJual = $row->hargaJual;
                                // $hJual = $row->hargaJual * 1;
                                // $hJualDis = $row->hargaJual*(100-$row->persen)/100;
                                // $harga = ($row->stock <= 0 ? ('<p class="card-text" id="cardHarga" style="color:red;">Out of Stock</p>') : ($row->persen > 0 ? ('<p class="card-text" id="cardHarga"> <del><a style="color:red;"> Rp. '. $hJual.toLocaleString('id-ID') .'</a></del></p> <p class="card-text" id="cardHarga"> Rp. '.$hJualDis.toLocaleString('id-ID')+'</p>') : ('<p class="card-text" id="cardHarga"> Rp. '.$hJual.toLocaleString('id-ID').'</p>')));
                                echo 
                                '<div class="card" style="width: 18rem; margin-left:50px;">'.
                                    '<div class="card-body">'.
                                        '<a href="'.$red.$row->barangId.'">'.
                                            '<img class="card-img-top '. ($row->stock <= 0 ? ('overlay') : '') .'" alt="Card image cap" src="http://localhost/assets/logo/Ourlogo.png">'.
                                            '<div class="card-body">'.
                                                '<h5 class="card-title" align="center" id="cardNamaBarang">'.$row->barangNama.'</h5>'.
                                            '</div>'.
                                        '</a>'.
                                    '</div>' .
                                    '<div class="card-footer" align="center" style="margin-bottom:10px"><span class="spanHarga" id="harga"'.$counter.'" harga="'.$row->hargaJual.'">  '.
                                    '</span></div>'.
                                '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>    
    </div>
    <?php
        echo $footer;
    ?>
    <script>
        $(document).ready(function(){
            var judul = "Menampilkan hasil cari: " + '<?php echo $stringSearch; ?>';
            //console.log(judul);
            //alert(judul);
            $("#search").text(judul);
            let har = <?php echo $row->hargaJual ?>;
            $('.spanHarga').html("Rp"+har.toLocaleString('id-ID'));
            let produk = [];
            produk = <?php echo json_encode($produk); ?>;
            for(let i=0; i< <?php echo $countProduk ?>; i++){
                let idRow = "harga" + i;
                $("#"+idRow).html("Rp"+produk[i].hargaJual.toLocaleString('id-ID'))
            }
        });
    </script>
</body>
</html>