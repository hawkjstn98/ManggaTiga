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
            <h2 style="font-family: Nunito, sans-serif;" id="search"></h2>
            <div class="container" style="margin-bottom:25px;">
                <div class="row">
                    <?php
                        echo $card;
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
            var judul = '<?php echo $_COOKIE['search']?>';
            //console.log(judul);
            //alert(judul);
            $("#search").text(judul);
        });
    </script>
</body>
</html>