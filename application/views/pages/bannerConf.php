<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Banner Setting</title>
    <?php echo $css; ?>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="modalAddBanner" tabindex="-1" aria-labelledby="exampleModalCenterTitle" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


            <form id="formDetail" enctype="multipart/form-data" method="POST" >
            <div class="form-group">
                <div class="container-belakang">
                    <div class="form-group">
                        <label for="description">Description </label>
                        <input id="description" class="form-control" placeholder="Add Description Here" name="description">
                    </div>
                    <div class="box">
                        <span style="margin-left: 2%" class="kata-select">
                            Select image to upload:
                        </span>
                            <div class="input-group">
                                <div class="custom-file" style="width: 100%;">
                                    <input type="file" class="custom-file-input" name="imageUpload" id="inputImageBanner" onchange="readURL(this)" accept=".png,.jpg,.jpeg">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file (max. 2MB)</label>
                                </div>
                            </div>
                        <!-- bagian picture -->
                        <div class="pic">
                            <label class="row kata-select" style="margin-left: 2%"><p>Preview : <br></p></label>
                            <img style="margin-left: 5%;width: 50%; height: 50%;" id="imagePrev" src="https://via.placeholder.com/100" alt="imagePreview" >
                        </div>
                    </div>
                </div>
            </div>
                <button id="bannerbtnSubmit" type="submit" class="btn btn-info">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>

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
            <button class="btn btn-outline-primary float-right" id="addCarousel" data-toggle="modal" data-target="modalAddBanner">Add Promo Banner</button><br><br>
            <!--    Data Tables -->
            <table id="bannerData" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="dataCarousel">

                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mangga Tiga <?php echo date("Y")?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    <?php echo $js; ?>
    <!--    Custom JS-->
    <?php echo $bannercustomjs; ?>
</body>
</html>
