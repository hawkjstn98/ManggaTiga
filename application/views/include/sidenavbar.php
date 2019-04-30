<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url("cms/Admin"); ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-handshake"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Mangga Tiga</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?php base_url("cms/Admin/product"); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Inventory Management
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-money-check"></i>
    <span>Product</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">New :</h6>
      <a class="collapse-item" href="<?php echo base_url('Cms/NewProduct');?>">New Product</a>
      <a class="collapse-item" href="<?php echo base_url('Cms/NewBrand');?>">New Brand</a>
      <h6 class="collapse-header">Stock :</h6>
      <a class="collapse-item" href="<?php echo base_url('cms/ListProduct');?>">Product List</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Financial Report
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-file-alt"></i>
    <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
  Carousel Promo
</div>

  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('cms/Admin/banner');?>">
          <i class="far fa-flag"></i>
          <span>Banner</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">


  <!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->