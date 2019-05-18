<header class="header">
    <nav id="navbarutama" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <!-- Logo -->
        <div class="col-3">
            <img src="<?php echo base_url("/assets/logo/OurLogo.png ");?>" width="15%" height="15%">
            <a class="navbar-brand" href="<?php echo base_url("Home");?>" style="font-family: Nunito, sans-serif; color:white; ">ManggaTiga</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container">
            <!-- Search Bar -->
            <div class="col-5 wf">
                <form class="form-inline" method="POST" action='<?php echo base_url('/Redirect/search/');?>'> 
                    <input name="searchItem" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse navbar-collapse col-3" id="navbarSupportedContent">
                <button id="btnLogin" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Login</button>
                <div class="col-1"></div>
                <button id="btnRegister" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Register</button>
            </div>
        </div>
    </nav>
</header>
<br>
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
<script>
    <?php echo "var baseee='".base_url()."';"; ?>
    $("#btnLogin").click(function(){
        $("#modalLoginForm").modal();
    });



    $('#btnLoginConfirm').click(function(){
        let email = $('#email').val();
        let pass = $('#password').val();
        if(pass&&email){
            $.ajax({
                url: baseee+'/Home/LoginConfirm',
                type: 'post',
                dataType: 'json',
                data:{
                    email: email,
                    password : pass
                },
                success: function(res){
                    if(res.success){
                        alert("Login Success");
                        location.reload();
                    }else{
                        if(res.formerror){
                            alert("Email format Error");
                        }
                        else{
                            alert(res.data);
                        }
                    }
                }
            });
        }
        else{
            alert("Field cannot be empty");
        }

    });

    $("#btnRegister").click(function(){
        let a = baseee+"UserData/UserRegister";
        window.location.href = a;
    });
</script>