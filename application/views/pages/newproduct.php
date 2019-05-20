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

          <!-- Form Start -->
          <form id="formProduct" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="ProductName">Product Name</label>
                <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="Supplier">Brand</label>
                <select class="form-control" name="Brand" id="Brand">
                    <?php
                        foreach ($brand as $row){
                            echo '<option value="'.$row->brandId.'">'.$row->brandNama.'<option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Category">Category</label>
                <select class="form-control" name="Category" id="Category">
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
                <label for="Detail">Product Detail</label>
                <textarea id="Detail" name="Detail" class="form-control" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="QuantityPerUnit">Quantity Per Unit</label>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="QuantityPerUnit" id="QuantityPerUnit" placeholder="Quantity Per Unit">
                  <div class="input-group-append">
                    <span class="input-group-text">Unit</span>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">Rp.</span>
                  </div>
                  <input type="number" class="form-control" name="Price" id="Price" placeholder="Price">
                </div>
            </div>
            <div class="form-group">
              <label for="Picture">Picture</label>
              <div class="custom-file" style="width: 100%;">
                  <input type="file" class="custom-file-input" name="imageUpload" id="inputImageBanner" onchange="readURL(this)" accept=".png,.jpg,.jpeg" required multiple>
                  <label class="custom-file-label" for="inputGroupFile04">Choose file (max. 2MB)</label>
              </div>
            </div>
            <button class="btn btn-primary" type="submit" id="submitForm" value="Submit">Submit</button>
            <a class="btn btn-danger" href="<?php echo base_url('/') ?>">Cancel</a>
          </form>
          <!-- Form End -->
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
  <script>
    function readURL(input){
        //alert(input.files[0].size);
        if(input.files[0].size<2200000){

            if(input.files && input.files[0]){
                var read = new FileReader();

                read.onload = function(f){
                    $('#imagePrev').attr('src', f.target.result);
                };
                read.readAsDataURL(input.files[0]);
            }
        }
        else{
            alert("Picture size exceeding 2MB !, Please upload again.");
        }
    }
  </script>
</body>

</html>
