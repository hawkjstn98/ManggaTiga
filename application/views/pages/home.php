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
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <input style="width:150px" type="email" class="form-control <?php echo form_error("username") != null ? "is-invalid" : ""; ?>" name="email" placeholder="Email" id="email" required>
                        <small class="form-text text-danger"><?php echo form_error("username")?></small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input style="width:150px" type="password" class="form-control <?php echo form_error("password") != null ? "is-invalid" : ""; ?>" name="password" placeholder="Password" id="password" required>
                        <small class="form-text text-danger"><?php echo form_error("password")?></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btnLoginConfirm" class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</div>
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