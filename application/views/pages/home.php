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
    echo $carousel;
  ?>
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form class="container">
                <br>
                <div class="form-group">
                  <div class="input-group">
                    <input style="width:150px" type="email" class="form-control" name="email" placeholder="Email" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input style="width:150px" type="text" class="form-control" name="password" placeholder="Password" required="required">
                  </div>
                </div>
              </form>
              <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-success">Login</button>
              </div>
          </div>
      </div>
  </div>
  <div class="row col-sm-12">
    <a class="col-sm-4" href="#"></a>
    <h1 class="col-sm-4" style="text-align: center">Recommendation</h1>
  </div>
  <br>
  <div class="container">
    <div id="cardgridrecom" class="row">
      <?php
        echo $card;
      ?>
    </div>
  </div><br>
  <div class="row col-sm-12">
    <a class="col-sm-4" href="#"></a>
    <h1 class="col-sm-4" style="text-align: center">New Arrival</h1>
  </div>
  <br>
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