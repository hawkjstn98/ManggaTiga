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
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button type="button" class="btn btn-outline-success my-2 my-sm-0" onclick="location.href='<?php echo base_url('/Redirect/search/');?>'" type="submit">Search</button>
        </form>
      </div>
      <div class="collapse navbar-collapse col-4" id="navbarSupportedContent">
      <!-- List Menu -->
          <p><?php echo  "Hello ,".$this->session->userdata('user'); ?></p>
        <a class="nav-link" href="<?php echo base_url("Redirect/shoppingchart");?>"><img src="<?php echo base_url("/assets/logo/cart.png");?>" width="20" height="20"></a>
        <a class="nav-link" href="#"><img src="<?php echo base_url("/assets/logo/user.png");?>" width="20" height="20"></a>
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" id="btnLogout">Log Out</button>
      </div>
    </div>
  </nav>
</header>
<br>
