<!DOCTYPE html>
<html>
<head>
    <title>Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
	?>
	<script src="<?php echo base_url('assets/js/bootstrap-input-spinner.js'); ?>"></script>
</head>
<body>
<?php 
		if($this->session->has_userdata('user')){echo $staticnavbarLoggedin; } else { echo $staticnavbarUnloggedin; } ;
		echo $dynamicnavbar;
?>
<div class="container" style="margin-bottom:25px;">
	<div class="card">
		<div class="container-fluid">
			<div class="wrapper row">
			<?php foreach($produk as $barang): ?>
				<div class="preview col-md-6">
					<div class="preview-pic tab-content">
					  <div class="tab-pane active" id="pic-1"><img src="mwbgod.jpg" /></div>
					  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
					</div>
					<ul class="preview-thumbnail nav nav-tabs">
					  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					</ul>			
				</div>
				<div class="details col-md-6">
					<h3 class="product-title"><?php echo $barang->barangNama?></h3>
					<div class="container">
						<p class="product-description"><?php echo $barang->details?></p>
						<h4 class="price">Current Price: <span class="spanHarga">  </span></h4>
						<label>Jumlah : </label>
						<div class="row" id="barangStock">
							<input id='txtQty' placeholder="Enter number" value="" min="1" max="<?php echo $barang->stock?>" type="number" class="input col-3" required>
						</div>
						<br>	
						<div class="action row">
							<button class="btn btn-success" type="button" id="buttonAdd">Add To Cart</button>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<script>
	//let harga = (data[i].stock <= 0 ? ('<p class="card-text" id="cardHarga" style="color:red;">Out of Stock</p>') : (data[i].persen > 0 ? ('<p class="card-text" id="cardHarga"> <del><a style="color:red;"> Rp. '+ hJual.toLocaleString('id-ID') +'</a></del></p> <p class="card-text" id="cardHarga"> Rp. '+hJualDis.toLocaleString('id-ID')+'</p>') : ('<p class="card-text" id="cardHarga"> Rp. '+hJual.toLocaleString('id-ID')+'</p>')));
</script>
<?php 
    echo $footer;
?>
<script>
		var basds = '<?php echo base_url() ?>';
		let har = <?php echo $barang->hargaJual ?>;
		let stock = <?php echo $barang->stock ?>;
		let persen = <?php echo $barang->persen ?>;
		$(document).ready(function(){
			if(persen > 0){
				let harpersen = har*(100-persen)/100;
				$('.spanHarga').html('<del><a style="color:red;">Rp '+har.toLocaleString('id-ID')+'</a></del> '+"Rp "+harpersen.toLocaleString('id-ID'));
			}
			else{
				$('.spanHarga').html("Rp "+har.toLocaleString('id-ID'));
			}
			if(stock <= 0){
				$('#barangStock').html('<p class="card-text" id="cardHarga" style="color:red;">Out of Stock</p>');
			}
			$('#buttonAdd').click(function(){
					let name = '<?php echo $produk[0]->barangNama ?>';
					let harga = '<?php echo $produk[0]->hargaJual ?>';
					let jumlah = $('#txtQty').val();
					let id = '<?php echo $produk[0]->barangId ?>';
					
					$.ajax({
						url: basds+'Home/InputToCart',
						type: 'post',
								dataType : 'json',
						data: {
							"name": name,
							"harga": harga,
							"jumlah": jumlah,
                            "id": id
						},
						success : function(res){
							if(res.success){
                                alert("Ditambah ke keranjang " + name);
							}
							else if(res.data == "SessionNotFound"){
								alert("Login First");
								$('#modalLoginForm').modal();
								$('#email').focus();
							}
							else{
								alert(res.data);
							}
						}
					});
			})
				
		});
				
		$("#txtQty").inputSpinner();
				
</script>
</body>
</html>