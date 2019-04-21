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
    echo $staticnavbarLoggedin;
    echo $dynamicnavbar;
    echo $carousel;
  ?>
  <div class="row">
    <div class="col-1"></div> 
    <h1 align="center">Recommendation</h1>
  </div><br>
  <div class="container">
    <div id="cardgridrecom" class="row">
      <?php
        echo $card;
      ?>
    </div>
  </div><br>
  <div class="row">
    <div class="col-1"></div> 
    <h1 align="center">New Arrival</h1>
  </div><br>
  <div class="container">
    <div id="cardgridnew" class="row">
      <?php
        echo $card;
      ?>
    </div>
  </div><br>
  <?php
    echo $footer;
  ?>
</body>    
</html>