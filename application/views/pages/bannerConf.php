<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Banner Setting</title>
    <?php echo $css;
            echo $js; ?>
</head>
<body>

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
            <button class="btn btn-outline-primary float-right" id="addCarousel">Add Promo Banner</button><br><br>
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

    <!--    Custom JS-->
    <?php echo $bannercustomjs; ?>
</body>
</html>
