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

          <!-- Product Table -->
          <table id="tableTransaksi">
            <thead>
              <tr>
                <th>Transaction ID</th>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah Barang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
                foreach ($transaction as $row){
                  echo "<tr>";
                  echo "<td>".$row->transactionId."</td>";
                  echo "<td>".$row->namaDepan." ".$row->namaBelakang."</td>";
                  echo "<td>".$row->barangNama."</td>";
                  echo "<td>".$a->format($row->barangHarga)."</td>";
                  echo "<td>".$row->jumlah." Unit</td>";
                  echo "<td> <button class='btn btn-danger db'><i class='fas fa-times-circle'></i></button> </td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
          
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
  <script>
    $(document).ready(function() {
      var tab = $('#tableTransaksi').DataTable({
        columnDefs:[
          {
            targets: 5,
            width: 60,
          }
        ],
        processing: true,
      });

      $("#tableBarang tbody").on("click", ".eb", function () {
        let data = tab.row($(this).parents("tr")).data();
        alert(data[0]);

      });

      //DELETE BUTTON HANDLER
      $("#tableBarang tbody").on("click", ".db", function () {
        let data = tab.row($(this).parents("tr")).data();
        alert(data[0]);

      });
    });
  </script>
</body>

</html>
