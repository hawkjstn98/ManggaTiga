<!DOCTYPE html>
<html>
<head>
    <title>Register Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
    ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
</head>
<body>
    <form>
        <div class="form-group">
            <label for="firstnRegist">Nama Depan</label>
            <input type="text" class="form-control" id="firstnRegist">
        </div>
        <div class="form-group">
            <label for="lastnRegist">Nama Belakang</label>
            <input type="text" class="form-control" id="lastnRegist">
        </div>
        <div class="form-group">
            <label for="emailRegist">Email</label>
            <input type="email" class="form-control" id="emailRegist">
        </div>
        <div class="form-group">
            <label for="phonenoRegist">Nomor HP</label>
            <input type="text" class="form-control" id="phonenoRegist">
        </div>
        <div class="form-group">
            <label for="alamatRegist">Alamat</label>
            <input type="text" class="form-control" id="alamatRegist">
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</body>