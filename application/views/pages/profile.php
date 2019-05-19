<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Profile</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <?php
    echo $css;
    echo $js;
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/animate.min.css");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/demo.css");?>">
    <!-- Animation library for notifications   -->

    <!--  Light Bootstrap Table core CSS    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/light-bootstrap-dashboard.css");?>">
<!--    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>-->


    <!--  CSS for Demo Purpose, don't include it in your project     -->


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/pe-icon-7-stroke.css");?>">
</head>
<body>
<?php
if($this->session->has_userdata('user')){echo $staticnavbarLoggedin; } else { echo $staticnavbarUnloggedin; echo "<h2 style='margin-left: 40% ;margin-top: 50%'>PLEASE LOGIN FIRST<h2></h2>"; return; } ;
?>
<div class="wrapper" style="margin-top: 20px;">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 5%">
                        <div class="card" id="cardHeader">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" disabled class="form-control" placeholder="Username" id="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" disabled class="form-control" placeholder="Email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <input type="tel" class="form-control" disabled placeholder="Phone Number" id="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Company" id="fname">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" id="lname">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" id="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Saldo : </label>
                                                <input type="number" class="form-control" placeholder="duit" id="saldo">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right" id="btnUpdate">Update Profile</button>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-user">
                            <div class="content" id="detail">
                                <div class="author" style="margin-top: 0.1px;">
                                    <a>
                                        <h4 class="title">Transaction History<br/>
                                        </h4>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

    

<!--   Core JS Files   -->

<!--  Charts Plugin -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js'); ?>"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-select.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/chartist.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>

<script>
   <?php echo "var basedp='".base_url()."';"; ?>

   renderData();

   renderTransaction();

   function renderData(){
       $.ajax({
           url: basedp+'ProfileController/renderUserData',
           type: 'post',
           dataType: 'json',
           data: {"username": '<?php echo $this->session->userdata('user')?>'},
           success: function(res){
               console.log(res.data);
               var data = res.data;
               if(res.success){
                   $('#email').val(data[0].email);
                   $('#username').val(data[0].username);
                   $('#address').val(data[0].alamat);
                   $('#fname').val(data[0].namaDepan);
                   $('#lname').val(data[0].namaBelakang);
                   $('#phone').val(data[0].noHP);
                   $('#saldo').val(data[0].saldo);
               }
               else{
                   alert(res.data);
               }
           }
       });
   }

   function renderTransaction(){
       $.ajax({
           url: basedp+'ProfileController/renderTranscationData',
           type: 'post',
           dataType: 'json',
           data: {"username": '<?php echo $this->session->userdata('user')?>'},
           success: function(res){
               console.log(res);
               var data = res.data;
               if(res.success){
                  let det = $('#detail');
                  for(let i =0; i< data.length; i++){
                      let z = '';
                      let total = 0;
                      for(let j = 0; j < data[i].barang.length; j++){
                          z+='<h5 class="card-text">Nama : '+data[i].barang[j].barangNama+'</h5>'+
                              '<h6 class="card-text">Jumlah : '+data[i].barang[j].barangJumlah+'</h6>'+
                              '<h6 class="card-text">Harga  : '+data[i].barang[j].barangHarga+'</h6>'+
                              '<hr align="center" width="50%">';
                          total += (data[i].barang[j].barangJumlah*data[i].barang[j].barangHarga)
                      }
                      det.append('<div class="card" style="width: 100%;">'+
                          '<div class="card-body">'+
                          '<h5 class="card-title">Transaction Id : '+data[i].id+'</h5>'+
                            '<h6 class="card-subtitle mb-2 text-muted">Time : '+data[i].waktu+' </h6>'+
                            '<h4 class="card-text">Detail</h4>'+z+
                            '<h4 class="card-footer" style="color: deepskyblue">Total : '+total+'</h4>');
                      }
                  }
                   else{
                       alert(res.data);
                   }
               // ''<a style="color: deepskyblue">Total : </a>
                  }
       });
   }



    $('#btnUpdate').click(function(){
        let fname = $('#fname').val();
        let lname = $('#lname').val();
        let address = $('#address').val();
        let balance = $('#saldo').val();
        if(fname && lname && address && balance > 0){
            $.ajax({
                url: basedp+'ProfileController/updateDataUser',
                type: 'post',
                dataType: 'json',
                data: {"firstName": fname,
                    "lastName": lname,
                    "address": address,
                    "saldo": balance,
                    "username": '<?php echo $this->session->userdata('user')?>'
                },
                success: function(res){
                    if(res.success){
                        alert("Update Success");
                        renderData();
                    }
                    else{
                        alert("Update Error");
                    }
                }
            })
        }
        else{
            alert("There's empty column or balance less than 0");
        }
    });

</script>

</html>
