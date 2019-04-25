<!DOCTYPE html>
<html>
<head>
    <title>Register Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
    ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style>
        body {
            background-color: #1cc88a;
        }
    </style>    
</head>

<body>
    <div class="container card" style="width:600px;">
        <form>
            <div class="form-header" align="center">
                <h1>manggatiga.com</h1>
                <br>
                <h3>Register</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="firstnRegist">Nama Depan</label>
                    <input type="text" class="form-control" id="firstnRegist">
                </div>
                <div class="col-6 form-group">
                    <label for="lastnRegist">Nama Belakang</label>
                    <input type="text" class="form-control" id="lastnRegist">
                </div>
            </div>
            <div class="form-group">
                <label for="emailRegist">Email</label>
                <input style="width:350px;" type="email" class="form-control" id="emailRegist">
            </div>
            <div class="form-group">
                <label for="lastnRegist">Username</label>
                <input style="width:250px;" type="text" class="form-control" id="lastnRegist">
            </div>
            <div class="form-group">
                <label for="lastnRegist">Password</label>
                <input style="width:250px;" type="password" class="form-control" id="lastnRegist">
            </div>
            <div class="form-group">
                <label for="phonenoRegist">Nomor HP</label>
                <input style="width:250px;" type="text" class="form-control" id="phonenoRegist">
            </div>
            <div class="form-group">
                <label for="alamatRegist">Alamat</label>
                <input style="width:450px;" type="text" class="form-control" id="alamatRegist">
            </div>
            <div class="form-footer row">
                <div class="col-4"></div>
                <button type="submit" class="col-4 btn btn-success">Register</button>    
            </div>
        </form>
    </div>
</body>