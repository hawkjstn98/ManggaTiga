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

          <h1 style="display: inline-block; padding-right: 5px">New Product</h1>
          <h4 style="display: inline-block">Mangga Tiga</h4>
          <hr class="sidebar-divider">

          <form method="post" action="<?php echo base_url('Cms/insert_action'); ?>">
              <div class="form-group">
                  <label for="ProductName">Product Name</label>
                  <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Product Name" required>
              </div>
              <div class="form-group">
                  <label for="Supplier">Brand</label>
                  <select class="form-control" name="Brand" id="Brand" required>
                      <?php
                          foreach ($brand as $row){
                              echo '<option value="'.$row->brandId.'">'.$row->brandNama.'<option>';
                          }
                      ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="Category">Category</label>
                  <select class="form-control" name="Category" id="Category" required>
                      <?php
                          foreach ($category as $row){
                            if(isset($row->categoryId)){
                              echo '<option value="'.$row->categoryId.'">'.$row->categoryNama.'<option>';
                            }
                          }
                      ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="QuantityPerUnit">Quantity Per Unit</label>
                  <input type="number" class="form-control" name="QuantityPerUnit" id="QuantityPerUnit" placeholder="Quantity Per Unit"  required>
              </div>
              <div class="form-group">
                  <label for="Price">Price</label>
                  <input type="number" class="form-control" name="Price" id="Price" placeholder="Price"  required>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php echo $js ?>
  <?php echo $blankbegone ?>
</body>

</html>
