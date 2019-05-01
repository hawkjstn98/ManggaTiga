<!DOCTYPE html>
<html>
<head>
    <title>Register Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
	body {
		color: #fff;
		background: #1cc88a;
		font-family: 'Roboto', sans-serif;
	}
	.form-control, .form-control:focus, .input-group-addon {
		border-color: #e1e1e1;
	}
    .form-control, .btn {        
        border-radius: 3px;
    }
	.signup-form {
		width: 390px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .signup-form form {
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
	.signup-form .form-control {
		min-height: 38px;
		box-shadow: none !important;
	}	
	.signup-form .input-group-addon {
		max-width: 42px;
		text-align: center;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 2px;
	}   
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #19aa8d;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #179b81;
        outline: none;
	}
	.signup-form a {
		color: #fff;	
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #19aa8d;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
	.signup-form .fa {
		font-size: 21px;
	}
	.signup-form .fa-paper-plane {
		font-size: 18px;
	}
	.signup-form .fa-check {
		color: #fff;
		left: 17px;
		top: 18px;
		font-size: 7px;
		position: absolute;
	}
</style>
</head>
<body>
<div class="signup-form">
        <div class="form-header" align="center">
            <h2>Register</h2>
            <p>manggatiga.com</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 form-group">
                <div class="input-group">
                    <input id="fname" type="text" class="form-control <?php echo form_error("fname") != null ? "is-invalid" : ""; ?>" name="firstname" placeholder="First Name" required="required">
                </div>
                <small class="form-text text-danger"><?php echo form_error("fname")?></small>
            </div>
            <div class="col-6 form-group">
                <div class="input-group">
                    <input id="lname" type="text" class="form-control <?php echo form_error("lname") != null ? "is-invalid" : ""; ?>" name="lastname" placeholder="Last Name" required="required">
                </div>
                <small class="form-text text-danger"><?php echo form_error("lname")?></small>
            </div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input id="uname" type="text" class="form-control <?php echo form_error("user") != null ? "is-invalid" : ""; ?>" name="username" placeholder="Username" required="required">
			</div>
            <small class="form-text text-danger"><?php echo form_error("user")?></small>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input id="email" type="email" class="form-control <?php echo form_error("email") != null ? "is-invalid" : ""; ?>" name="email" placeholder="Email" required="required">
			</div>
            <small class="form-text text-danger"><?php echo form_error("email")?></small>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control <?php echo form_error("pass") != null ? "is-invalid" : ""; ?>" name="password" placeholder="Password" required="required">
			</div>
            <small class="form-text text-danger"><?php echo form_error("pass")?></small>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-home"></i></span>
				<input id="address" type="text" class="form-control <?php echo form_error("address") != null ? "is-invalid" : ""; ?>" name="address" placeholder="Address" required="required">
			</div>
            <small class="form-text text-danger"><?php echo form_error("address")?></small>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
				<input id="phone"  type="tel" class="form-control <?php echo form_error("phone") != null ? "is-invalid" : ""; ?>" name="phonenumber" placeholder="Example : 085368472863" required="required">
			</div>
            <small class="form-text text-danger"><?php echo form_error("phone")?></small>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button id="btnSignup" type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
</div>
    <?php echo $customJS;?>
</body>
</html>