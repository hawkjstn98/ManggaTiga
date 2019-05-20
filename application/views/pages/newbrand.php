<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mangga Tiga Admin</title>

  <?php echo $css ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php echo $sidenavbar ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php echo $topnavbar ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 style="display: inline-block; padding-right: 5px">New Brand</h1>
          <h4 style="display: inline-block">Mangga Tiga</h4>
          <hr class="sidebar-divider">

          <form id="formBrand" enctype="multipart/form-data" method="post">
              <div class="form-group">
                  <label for="BrandName">Brand Name</label>
                  <input type="text" class="form-control" name="BrandName" id="BrandName" placeholder="Brand Name">
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
              <a class="btn btn-danger" href="<?php echo base_url('/') ?>">Cancel</a>
          </form>
          
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mangga Tiga 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php echo $js ?>
  <?php echo $blankbegone ?>
</body>

</html>
