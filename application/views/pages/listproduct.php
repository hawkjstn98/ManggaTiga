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
          <table id="tableBarang">
            <thead>
              <tr>
                <th></th>
                <th>Nama Barang</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Promo</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $a = new \NumberFormatter("id-ID", \NumberFormatter::CURRENCY);
                if($product){
                  foreach ($product as $row){
                    echo "<tr>";
                    echo "<td>".$row->barangId."</td>";
                    echo "<td>".$row->barangNama."</td>";
                    echo "<td>".$row->brandNama."</td>";
                    echo "<td>".$row->categoryNama."</td>";
                    echo "<td>".$row->persen."%</td>";
                    echo "<td>".$a->format($row->hargaJual)."</td>";
                    echo "<td>".$row->stock." Unit</td>";
                    echo "<td> <button class='btn btn-warning text-white eb'><i class='fas fa-edit'></i></button><button class='btn btn-danger db'><i class='fas fa-times-circle'></i></button> </td>";
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

  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" id="nama-mod">
            <label for="nama1">Nama Barang</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="nama1" id="nama1" placeholder="Nama Barang" disabled>
            </div>
          </div>
          <div class="form-group" id="promo-mod">
            <label for="promo1">Promo</label>
            <select class="form-control" id="promo1">
              <?php
                  foreach ($promo as $row){
                    if(isset($row->persen)){
                      echo '<option value="'.$row->promoId.'">'.$row->persen.'%<option>';
                    }
                  }
              ?>
            </select>
          </div>
          <div class="form-group" id="harga-mod">
            <label for="harga1">Harga</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control" name="harga1" id="harga1" placeholder="Harga">
            </div>
          </div>
          <div class="form-group" id="stock-mod">
            <label for="stock1">Stock : <?php  ?></label>
            <div class="input-group mb-3">
              <input type="number" class="form-control" name="stock1" id="stock1" placeholder="Tambah Stock">
              <div class="input-group-append">
                <span class="input-group-text">Unit</span>
              </div>
            </div>
          </div>
          <div class="form-group" id="akses-mod">
            <label for="akses1">Availability</label>
            <select class="form-control" id="akses1">
              <option value="0">Unavailable</option>
              <option value="1">Available</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Save</a>
        </div>
      </div>
    </div>
  </div>

  <?php echo $js ?>
  <script>
    $(document).ready(function() {
      var base = "<?php echo base_url(''); ?>";
      var tab = $('#tableBarang').DataTable({
        columnDefs:[
          {
            targets: 0,
            visible: false,
            searchable: false,
          },
          {
            targets: 7,
            width: 60,
          }
        ],
        processing: true,
      });

      $('select option')
        .filter(function() {
            return !this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0;
        })
      .remove();

      // $.ajax({
      //   url: base+'Cms/InputToCart',
      //   type: 'post',
      //       dataType : 'json',
      //   data: {
      //     "idBarang": id,
      //     "harga": harga,
      //     "jumlah": jumlah
      //   },
      //   success : function(res){
      //     if(res.success){
      //       alert("Ditambah ke keranjang " + id);
      //     }
      //     else if(res.data == "SessionNotFound"){
      //       alert("Login First");
      //       $('#modalLoginForm').modal();
      //       $('#email').focus();
      //     }
      //     else{
      //       alert(res.data);
      //     }
      //   }
      // });

      //EDIT BUTTON HANDLER
      $("#tableBarang tbody").on("click", ".eb", function () {
        let data = tab.row($(this).parents("tr")).data();
        $('#editModal').modal();

        });

      //DELETE BUTTON HANDLER
      $("#tableBarang tbody").on("click", ".db", function () {
        let data = tab.row($(this).parents("tr")).data();
        let base = "<?php echo base_url() ?>";
        //alert("ID: " + data[0]);
        //alert("Barang: " + data[1]);
        let conf = confirm("Delete this transaction ?");
        if(conf){
            let barang = data[1];
            let id = data[0];
            $.ajax({
                url: base+"cms/DeleteProduct",
                type: 'post',
                dataType: 'json',
                data: {
                    "barang": barang,
                    "id": id
                },
                success: function(){
                  location.reload();
                }
              
            });
        }
      });
    });
  </script>
</body>

</html>
