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
                <div class="row">
                    <?php
                        if($produk==null){
                            echo "<div class='col-3'></div><div class='col-9'><img src=". base_url('/assets/logo/notfound.png') . "></img></div>";
                        }
                        else{
                            foreach($produk as $row){
                                echo $row->barangNama;
                                echo $row->hargaJual;
                                echo $row->categoryNama;
                                echo $row->persen;
                                echo $row->barangNama;
                                echo $row->stock;
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
            var judul = "Menampilkan hasil cari: " + '<?php echo $_COOKIE['search']?>';
            //console.log(judul);
            //alert(judul);
            $("#search").text(judul);
        });
    </script>
</body>
</html>