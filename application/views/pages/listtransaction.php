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
                <th>idbarang</th>
                <th>ID</th>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Alamat</th>
                <th>Jumlah Barang</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
                if($transaction){
                    foreach ($transaction as $row){
                        echo "<tr>";
                        echo "<td>".$row->barangId."</td>";
                        echo "<td>".$row->transactionId."</td>";
                        echo "<td>".$row->namaDepan." ".$row->namaBelakang."</td>";
                        echo "<td>".$row->barangNama."</td>";
                        echo "<td>".$row->alamat."</td>";
                        echo "<td>".$row->jumlah." Unit</td>";
                        echo "<td>".$a->format($row->jumlah*$row->barangHarga)."</td>";
                        echo "<td>".$row->statusName."</td>";
                        echo "<td> <button class='btn btn-danger db'><i class='fas fa-times-circle'></i></button> </td>";
                        echo "</tr>";
                      }
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

  <?php echo $js ?>
  <script>
    $(document).ready(function() {
      var tab = $('#tableTransaksi').DataTable({
        columnDefs:[
        {
            targets: 0,
            visible: false,
        },
        {
            targets: 6,
            width: 60,
        }
        ],
        processing: true,
      });

      //DELETE BUTTON HANDLER
      $("#tableTransaksi tbody").on("click", ".db", function () {
        let data = tab.row($(this).parents("tr")).data();
        let base = "<?php echo base_url() ?>";
        let conf = confirm("Are you sure want to delete this transaction ?");
        if(conf){
            let barang = data[0];
            let id = data[1];
            $.ajax({
                url: base+"cms/Admin/DeleteTransaction",
                type: 'post',
                dataType: 'json',
                data: {
                    "barang": barang,
                    "id": id
                },
                success: function(res){
                    if(res.success){
                        alert(res.data+", Transaction Deleted");
                        location.reload();
                    }
                }
            });
        }
      });
    });
  </script>
</body>

</html>
