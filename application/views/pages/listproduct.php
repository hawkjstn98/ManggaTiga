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
                    echo "<td> <button class='btn btn-secondary text-white ep'><i class='fas fa-image'></i></button> <button class='btn btn-warning text-white eb'><i class='fas fa-edit'></i></button> <button class='btn btn-danger db'><i class='fas fa-times-circle'></i></button> </td>";
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

  <!-- Edit Picture Modal -->
  <div class="modal fade" id="editPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="submit" method="post" enctype="multipart/form-data">
            
            <div class="form-group" id="nama-mod">
              <label for="nama1">Nama Barang</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="nama2" id="nama2" placeholder="Nama Barang" disabled>
                <input type="text" class="form-control" name="category2" id="category2" disabled hidden>
                <input type="text" class="form-control" name="barangid2" id="barangid2" disabled hidden>
              </div>
            </div>
            <div class="form-group">
              <label for="Picture">Picture</label>
              <div class="custom-file" style="width: 100%;">
                  <input type="file" class="custom-file-input" name="imageUpload" id="inputImageBanner" onchange="readURL(this)" accept=".png,.jpg,.jpeg" required >
                  <label class="custom-file-label" for="inputGroupFile04">Choose file (max. 2MB)</label>
              </div>
            </div>
            <div class="pic">
                <label class="row kata-select" style="margin-left: 2%"><p>Preview : <br></p></label>
                <img style="margin-left: 5%;width: 50%; height: 50%;" id="imagePrev" src="https://via.placeholder.com/100" alt="imagePreview" >
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="submit" id="savePic" href="#" >Save</button>
            </div>
          </form>
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
                      echo '<option value="'.$row->promoId.'" id="promo-' .$row->promoId. '">'.$row->persen.'%<option>';
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
              <option value="0" id="akses-0">Unavailable</option>
              <option value="1" id="akses-1">Available</option>
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="Picture">Picture</label>
            <div class="custom-file" style="width: 100%;">
                <input type="file" class="custom-file-input" name="imageUpload" id="inputImageBanner" onchange="readURL(this)" accept=".png,.jpg,.jpeg" required multiple>
                <label class="custom-file-label" for="inputGroupFile04">Choose file (max. 2MB)</label>
            </div>
          </div> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="updateProduct">Save</a>
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
            width: 120,
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

      //Variable to be used after AJAX recieve data from opening modal (101)
      let barangId, promoId, stock, aksesBarang, hargaJual;
      let category;
      //EDIT PICTURE HANDLER
      $("#tableBarang tbody").on("click", ".ep", function(){
        //console.log("Edit Picture Button Pressed");
        let data = tab.row($(this).parents("tr")).data();

        let gambar = data[9];
        let id = data[0];
        category = data[3];

        $("#editPicture").modal(
          $.ajax(
            {
              url: base+'cms/getEditDetails',
              type: 'post',
              dataType : 'json',
              data: {
                "idBarang": id
              },
              success : function(res){
                $('#nama2').val(res[0].barangNama); 
                $('#category2').val(res[0].categoryId); 
                $('#barangid2').val(res[0].barangId); 
                barangId = id;
                category = res[0].categoryId;
              },
              error: function(){
                alert("Error");
                console.log("error");
              }
            }
          )
        )
      });

      //SAVE PICTURE BUTTON HANDLER
      $('#savePic').click(function(e){
        e.preventDefault();
        //alert("fuck this la");
        //var form = $('#submit')[0];

        // let image = $("#inputImageBanner").change(function(){

        // });
        //  alert(image);

        var formData = new FormData();
        formData.append('barangId', barangId);
        formData.append('category', category);
        // formData.append('imageUpload', image);
        formData.append('imageUpload', $('input[type=file]')[0].files[0]);

        $.ajax({
          url: base+'cms/UpdateProductPicture',
          type: "POST",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(data){
            //alert("Upload Image Successful.");
            location.reload();
          },
          error: function(){
            alert("error anjeng");
          }
        });
      })
      // $('.modal-footer').on("click", '#savePic', function(){
      //   let brgId = barangId;
      //   let ctgry = category;

      //   //alert(brgId);
      //   //alert(ctgry);

      //   $.ajax({
      //     url:base+'cms/UpdateProductPicture',
      //     type:"post",
      //     dataType: 'json',
      //     data: {
      //       "brgId": brgId,
      //       "ctgry": ctgry
      //     }, //this is formData
      //     success: function(data){
      //       //alert("Upload Image Successful.");
      //       //location.reload();
      //     }
      //   });
      // });

      //EDIT BUTTON HANDLER
      $("#tableBarang tbody").on("click", ".eb", function () {
        let data = tab.row($(this).parents("tr")).data();

        let barang = data[1];
        let id = data[0];
        let harga = data[5];
        let jumlah = data[6].trim();
        //console.log(barang + " " + id + " " + harga + " " + jumlah[0]);
        // alert(barang);
        // alert(id);
        // alert(harga);
        // alert(jumlah[0]);
        //console.log(base + 'cms/Admin/editModalProduct');

        $('#editModal').modal(
          $.ajax(
            {
              url: base+'cms/getEditDetails',
              type: 'post',
                  dataType : 'json',
              data: {
                "idBarang": id
              },
              success : function(res){
                //Saving to variable (101)
                barangId = id
                stock = res[0].stock;
                hargaJual = res[0].hargaJual;
                aksesBarang = res[0].aksesBarang;
                promoId = res[0].promoId;

                // console.log("Stock:" + res[0].stock);
                // console.log("Harga Jual:" + res[0].hargaJual);
                // console.log("Nama Barang:" + res[0].barangNama);
                // console.log("Akses Barang:" + res[0].aksesBarang);
                // console.log("Promo ID:" + res[0].promoId);

                let aksesVal = res[0].aksesBarang;
                let promoVal = res[0].promoId;

                // //masukkin value ke tag input
                $('#nama1').val(res[0].barangNama);
                $('#stock1').val(res[0].stock);
                $('#harga1').val(res[0].hargaJual);
                document.getElementById("akses-" + aksesVal).selected="selected";
                document.getElementById("promo-" + promoVal).selected="selected";
              },
              error: function(){
                console.log("error");
              }
            }
          )
        )

      });

      //SAVE BUTTON HANDLER
      $('.modal-footer').on("click", "#updateProduct",
        function(){
          console.log("Barang ID:" + barangId);
          console.log("Stock:" + stock);
          console.log("Harga Jual:" + hargaJual);
          console.log("Akses Barang:" + aksesBarang);
          console.log("Promo ID:" + promoId);

          promoId = $("#promo1 option:selected").val();
          // promoId = promo.options[promo.selectedIndex].value; //use this

          aksesBarang = $("#akses1 option:selected").val();
          // aksesBarang = akses.options[akses.selectedIndex].value; //use this
          stock = $("#stock1").val();
          hargaJual = $("#harga1").val();

          console.log("Stock:" + stock);
          console.log("Harga Jual:" + hargaJual);
          console.log("Akses Barang:" + aksesBarang);
          console.log("Promo ID:" + promoId);

          $.ajax(
            {
              url: base+'cms/UpdateProduct',
              type: 'POST',
              dataType: 'json',
              data:{
                "barangId": barangId,
                "promoId": promoId,
                "hargaJual": hargaJual,
                "stock": stock,
                "akses": aksesBarang
              },
              success: function(){
                console.log("update success");
                location.reload();
              },
              error: function(){
                console.log('failed update');
              }
            }
          );
        }
      );

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
