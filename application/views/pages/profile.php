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
if($this->session->has_userdata('user')){echo $staticnavbarLoggedin; } else { echo $staticnavbarUnloggedin; } ;
?>
<div class="wrapper" style="margin-top: 20px;">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
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

                                    <button type="submit" class="btn btn-info btn-fill pull-right" id="btnUpdate">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="content">
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

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
               }
               else{
                   alert(res.data);
               }
           }
       });
   }

   function renderTransaction(){
       $.ajax({
           url: basedp+'ProfileController/renderTransactionData',
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
               }
               else{
                   alert(res.data);
               }
           }
       });
   }



    $('#btnUpdate').click(function(){
        let fname = $('#fname').val();
        let lname = $('#lname').val();
        let address = $('#address').val();
        if(fname && lname && address){
            $.ajax({
                url: basedp+'ProfileController/updateDataUser',
                type: 'post',
                dataType: 'json',
                data: {"firstName": fname,
                    "lastName": lname,
                    "address": address,
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
    });
</script>

</html>
