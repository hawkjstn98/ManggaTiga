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
            <h1></h1>
        </main>
    </div>
    <?php
        echo $footer;
    ?>
</body>