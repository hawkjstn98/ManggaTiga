<header class="header">
  <nav id="navbarutama" class="row navbar navbar-expand-lg navbar-light bg-dark fixed-top">
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
        <form class="form-inline" method="POST" action='<?php echo base_url('/Redirect/search');?>'> 
          <input name="searchItem" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      <div class="collapse navbar-collapse col-4" id="navbarSupportedContent">
      <!-- List Menu -->
        <a class="navbar-brand" href="#" style="font-family: Nunito, sans-serif; color:white; font-size:14px;"><?php echo  "Hello ,".$this->session->userdata('user'); ?></a>
        <div style="margin-right:22px;">
          <button class="btn btn-primary" type="submit" onclick="location.href='<?php echo base_url('Redirect/shoppingchart');?>'" style="background-color: #71BEA3; border-color: #71BEA3;">
            <i class="fas fa-shopping-cart"></i>
          </button>
        </div>
        <div>
          <button id="btnLogout" class="btn btn-danger" type="submit" style="background-color: #EE3541; border-color: #EE3541;">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>
</header>
<br>
<script>
    <?php echo "var baseee='".base_url()."';"; ?>
    $('#btnLogout').click(function() {
        $.ajax({
            url: baseee+'/Home/Logout',
            type: 'post',
            data:{
            },
            success: function(res){
                alert(res);
                location.reload();
            }
        })
    });
</script>
