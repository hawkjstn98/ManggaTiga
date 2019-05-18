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
   // echo $staticnavbarUnLoggedin;
    echo $dynamicnavbar;
    echo $carousel;
  ?>

  <div class="row col-sm-12">
    <a class="col-sm-4" href="#"></a>
    <h1 class="col-sm-4" style="text-align: center">Recommendation</h1>
  </div>
  <br>
      <?php
       echo $card;
      ?>
  <br>
  <div class="row col-sm-12">
    <a class="col-sm-4" href="#"></a>
    <h1 class="col-sm-4" style="text-align: center">New Arrival</h1>
  </div>
  <br>
  <div class="container">
    <div id="cardgridnew" class="row">
      <?php
        echo $cardArrival;
      ?>
    </div>
  </div><br>
  <?php
    echo $footer;
    echo $customJS;
  ?>

</body>    
</html>